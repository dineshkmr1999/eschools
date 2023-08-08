<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('manage-expenses')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }

        $Expenses = Expense::get();
        return response(view('manage_expense.index', compact('Expenses')));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('manage-expenses')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'cost' => 'required|numeric',
            'description' => 'nullable',
        ], [
            'name.required' => trans('name_required'),
            'cost.required' => trans('cost_required'),
            'cost.numeric' => trans('cost_should_be_numeric'),
        ]);

        if ($validator->fails()) {
            $response = [
                'error' => true,
                'message' => $validator->errors()->first(),
            ];
            return response()->json($response);
        }
    try{
        $expense = new Expense();
        $expense->name = $request->input('name');
        $expense->cost = $request->input('cost');
        $expense->description = $request->input('description');
        $expense->save();

        } catch (Throwable $e) {
        $response = array(
            'error' => true,
            'message' => trans('error_occurred')
        );
        }
        $response = [
            'error' => false,
            'message' => trans('expense_created_successfully'),
        ];
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->can('manage-expenses')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $expensebyid = Expense::where('id',$id)->get();
        return response()->json($expensebyid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('manage-expenses')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'cost' => 'required|numeric',
            'description' => 'nullable',
        ], [
            'name.required' => trans('name_required'),
            'cost.required' => trans('cost_required'),
            'cost.numeric' => trans('cost_should_be_numeric'),
        ]);

        if ($validator->fails()) {
            $response = [
                'error' => true,
                'message' => $validator->errors()->first(),
            ];
            return response()->json($response);
        }

        try {
            $expense = Expense::find($id);

            if (!$expense) {
                $response = [
                    'error' => true,
                    'message' => trans('expense_not_found'),
                ];
                return response()->json($response);
            }

            $expense->name = $request->input('name');
            $expense->cost = $request->input('cost');
            $expense->description = $request->input('description');
            $expense->save();

            $response = [
                'error' => false,
                'message' => trans('expense_updated_successfully'),
            ];
        } catch (Throwable $e) {
            $response = [
                'error' => true,
                'message' => trans('error_occurred'),
            ];
        }
        
        return response()->json($response);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('manage-expenses')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }

        Expense::where('id', $id)->delete();
        $response = array(
            'error' => false,
            'message' => trans('expense_deleted_successfully')
        );
    }
}
