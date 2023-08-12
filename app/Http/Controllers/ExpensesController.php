<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        return view('expenses.index');

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
        log::info('hi');
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
    public function show()
    {
        if (!Auth::user()->can('manage-expenses')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $offset = 0;
        $limit = 10;
        $sort = 'id';
        $order = 'DESC';

        if (isset($_GET['offset']))
            $offset = $_GET['offset'];
        if (isset($_GET['limit']))
            $limit = $_GET['limit'];

        if (isset($_GET['sort']))
            $sort = $_GET['sort'];
        if (isset($_GET['order']))
            $order = $_GET['order'];
    
        $sql = Expense::with('user');
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->orwhere('cost', 'LIKE', "%$search%")
                ->orwhere('name', 'LIKE', "%$search%")
                ->orwhere('description', 'LIKE', "%$search%")
                ->orwhere('school_id', 'LIKE', "%$search%");
        }
        $total = $sql->count();

        $sql->orderBy($sort, $order)->skip($offset)->take($limit);
        $res = $sql->get();
    
        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $no = 1;
        foreach ($res as $row) {
        
            $operate = '<a class="btn btn-xs btn-gradient-primary btn-rounded btn-icon editdata" data-id=' . $row->id . ' data-url=' . url('expense') . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-url=' . url('expense', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';

            $data = getSettings('date_formate');

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['user_id'] = $row->user_id;
            $tempRow['name'] = $row->name;
            $tempRow['cost'] = $row->cost;
            $tempRow['description'] = $row->description;
            $tempRow['school'] = $row->school;

            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $expense = Expense::find($id);
        return response($expense);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
            $id = $request->id;
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
        $response = [
            'error' => false,
            'message' => trans('data_delete_successfully')
        ];
        return response()->json($response);
    }
}
