<?php

namespace App\Http\Controllers;

use App\Models\AdmissionEnquireMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmissionEnquireModeController extends Controller
{
    public function store(Request $request){

    //    if (!Auth::user()->can('admission-enquire')) {
    //         $response = array(
    //             'error' => true,
    //             'message' => trans('no_permission_message')
    //         );
    //         return response()->json($response);
    //     }
        $request->validate([
            'name' => 'required'
        ]);
        try {
            $enquire = new AdmissionEnquireMode();
            $enquire->enquire_mode = $request->name;
            $enquire->save();
            $response = [
                'error' => false,
                'message' => trans('data_store_successfully')
            ];
        } catch (\Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred')
            );
        }
      //  return response()->json($response);
      return redirect('/admission-enquire');
    }

    
    public function index(Request $request){
        return view('admission_enquire.index');
    }

    public function show() {
        // if (!Auth::user()->can('enquire-list')) {
        //     $response = array(
        //         'error' => true,
        //         'message' => trans('no_permission_message')
        //     );
        //     return response()->json($response);
        // }
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

        $sql = AdmissionEnquireMode::where('id', '!=', 0);
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")->orwhere('enqiure_mode', 'LIKE', "%$search%");
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
            $operate = '<a href=' . route('admission-enquire.edit', $row->id) . ' class="btn btn-xs btn-gradient-primary btn-rounded btn-icon edit-data" data-id=' . $row->id . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            $operate .= '<a href=' . route('admission-enquire.destroy', $row->id) . ' class="btn btn-xs btn-gradient-danger btn-rounded btn-icon delete-form" data-id=' . $row->id . '><i class="fa fa-trash"></i></a>';
//            $operate = '<a class="btn btn-xs btn-theme editdata" data-id=' . $row->id . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
//            $operate .= '<a class="btn btn-xs btn-danger deletedata" data-id=' . $row->id . ' title="Delete"><i class="fa fa-trash"></i></a>';

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['name'] = $row->enquire_mode;
            $tempRow['created_at'] = $row->created_at;
            $tempRow['updated_at'] = $row->updated_at;
            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }

    public function edit($id) {
        $enquire = AdmissionEnquireMode::find($id);
        return response($enquire);
    }

    public function update(Request $request) {
        // if (!Auth::user()->can('enquire-edit')) {
        //     $response = array(
        //         'error' => true,
        //         'message' => trans('no_permission_message')
        //     );
        //     return response()->json($response);
        // }
        $request->validate([
            'name' => 'required'
        ]);
        try {
            $enquire = AdmissionEnquireMode::find($request->id);
            $enquire->enquire_mode = $request->name;
            $enquire->save();
            $response = [
                'error' => false,
                'message' => trans('data_update_successfully'),
            ];
        } catch (Throwable $e) {
            $response = [
                'error' => true,
                'message' => trans('error_occurred'),
            ];
        }
        return response()->json($response);
    }

    public function destroy($id) {
        // if (!Auth::user()->can('enquire-delete')) {
        //     $response = array(
        //         'error' => true,
        //         'message' => trans('no_permission_message')
        //     );
        //     return response()->json($response);
        // }
        try {
            AdmissionEnquireMode::find($id)->delete();
            $response = [
                'error' => false,
                'message' => trans('data_delete_successfully')
            ];

            
            // //check wheather the class exists in other table
            // // $class = ClassSchool::where('enquire_id', $id)->count();
            // // $subject = Subject::where('enquire_id', $id)->count();

            // if($class || $subject){
            //     $response = array(
            //         'error' => true,
            //         'message' => trans('cannot_delete_beacuse_data_is_associated_with_other_data')
            //     );
            // }else{
               
            // }
        } catch (\Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }

  
}
