<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\StudentLateEntry;
use Throwable;
class StudentLateEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('student-lateentry-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        return view('students.lateentry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('student-lateentry-create')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $validator = Validator::make($request->all(), [
            'reason' => 'required',
            'entry_time' => 'required',
            'student_id' => 'required'
        ]);
        
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        try {
            $StudentLateEntry = new StudentLateEntry();
            $StudentLateEntry->reason =  $request->reason;
            $StudentLateEntry->entry_time = $request->entry_time;
            $StudentLateEntry->student_id = $request->student_id;
            $StudentLateEntry->save();
            $response = array(
                'error' => false,
                'message' => trans('data_store_successfully')
            );
        } catch (\Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred')
            );
        }
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
        if (!Auth::user()->can('student-lateentry-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
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
        
        $sql = StudentLateEntry::where('id','!=',0);
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
            ->orwhere('reason', 'LIKE', "%$search%")
            ->orwhere('student_id', 'LIKE', "%$search%")
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
            $operate = '';
            $operate .= '<a class="btn btn-xs btn-gradient-primary btn-rounded btn-icon editdata" data-id=' . $row->id . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-url=' . url('student-lateentry', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            
            
            $data = getSettings('date_formate');
            
            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['reason'] = $row->reason;
            $tempRow['entry_time'] = $row->entry_time;
            $tempRow['student_id'] = $row->student_id;
            
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
        if (!Auth::user()->can('student-lateentry-edit')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $validator = Validator::make($request->all(), [
            'reason' => 'required',
            'entry_time' => 'required',
            'student_id' => 'required'
        ]);
        
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        try {
            $StudentLateEntry = StudentLateEntry::find($request->id);
            $StudentLateEntry->reason =  $request->reason;
            $StudentLateEntry->entry_time = $request->entry_time;
            $StudentLateEntry->student_id = $request->student_id;
            $StudentLateEntry->save();
            $response = array(
                'error' => false,
                'message' => trans('data_update_successfully')
            );
        } catch (\Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred')
            );
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
        if (!Auth::user()->can('student-lateentry-delete')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        try {
            StudentLateEntry::find($id)->delete();
            $response = array(
                'error' => false,
                'message' => trans('data_delete_successfully')
            );
        } catch (Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred')
            );
        }
        return response()->json($response);
    }
}
