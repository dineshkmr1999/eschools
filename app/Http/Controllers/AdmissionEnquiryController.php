<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\AdmissionEnquiry;
use App\Models\EnquiryMode;
use Throwable;
class AdmissionEnquiryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admission-enquiry-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        return view('admission_enquire.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('admission-enquiry-create')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $validator = Validator::make($request->all(), [
            'admission_number' => 'required',
            'student_name' => 'required',
            'phone_number' => ['required', 'regex:/^\d{10}$/'],
            'email' => 'required|email',
            'student_dob' => 'required',
            'address' => 'required',
            'added_by' => 'required',
            'class' => 'required',
            'enquiry_date' => 'required',
            'enquiry_mode_id' => 'required',
            'previous_school' => 'required',
            'gender' => 'required',
            'parent_name' => 'required',
        ]);
        
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        try {
            $AdmissionEnquiry = new AdmissionEnquiry();
            $AdmissionEnquiry->admission_number = $request->admission_number;
            $AdmissionEnquiry->student_name = $request->student_name;
            $AdmissionEnquiry->phone_number = $request->phone_number;
            $AdmissionEnquiry->email = $request->email;
            $AdmissionEnquiry->student_dob = date('Y-m-d', strtotime($request->student_dob));
            $AdmissionEnquiry->address = $request->address;
            $AdmissionEnquiry->added_by = $request->added_by;
            $AdmissionEnquiry->class_applying_for = $request->class;
            $AdmissionEnquiry->enquiry_date = date('Y-m-d', strtotime($request->enquiry_date));
            $AdmissionEnquiry->enquiry_mode_id = $request->enquiry_mode_id;
            $AdmissionEnquiry->previous_school = $request->previous_school;
            $AdmissionEnquiry->gender = $request->gender;
            $AdmissionEnquiry->parent_name = $request->parent_name;
            $AdmissionEnquiry->save();
            $response = array(
                'error' => false,
                'message' => trans('data_store_successfully')
            );
        } catch (\Throwable $e) {
            log::info($e->getMessage());
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
        if (!Auth::user()->can('admission-enquiry-list')) {
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
        
        $sql = AdmissionEnquiry::with('enquiryMode');
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('mode_name', 'LIKE', "%$search%");
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
            
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-url=' . url('admissionenquiry', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            
            
            $data = getSettings('date_formate');
           
            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['admission_number'] = $row->admission_number;
            $tempRow['student_name'] = $row->student_name;
            $tempRow['phone_number'] = $row->phone_number;
            $tempRow['email'] = $row->email;
            $tempRow['address'] = $row->address;
            $tempRow['added_by'] = $row->added_by;
            $tempRow['class'] = $row->class_applying_for;
            $tempRow['student_dob'] = $row->student_dob;
            $tempRow['enquiry_date'] = $row->enquiry_date;
            $tempRow['enquiry_mode_id'] = $row->enquiryMode->mode_name;
            $tempRow['enquiry_mode'] = $row->enquiry_mode_id;
            $tempRow['previous_school'] = $row->previous_school;
            $tempRow['gender'] = $row->gender;
            $tempRow['parent_name'] = $row->parent_name;

            $tempRow['operate'] = $operate;
        
            $rows[] = $tempRow;
        }
        
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
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
        if (!Auth::user()->can('admission-enquiry-edit')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $validator = Validator::make($request->all(), [
            'admission_number' => 'required',
            'student_name' => 'required',
            'phone_number' => ['required', 'regex:/^\d{10}$/'],
            'address' => 'required',
            'added_by' => 'required',
            'student_dob' => 'required',
            'class' => 'required',
            'enquiry_date' => 'required',
            'enquiry_mode' => 'required',
            'previous_school' => 'required',
            'gender' => 'required',
            'parent_name' => 'required',
        ]);
        
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        try {
            $AdmissionEnquiry = AdmissionEnquiry::find($request->id);
            $AdmissionEnquiry->admission_number = $request->admission_number;
            $AdmissionEnquiry->student_name = $request->student_name;
            $AdmissionEnquiry->phone_number = $request->phone_number;
            $AdmissionEnquiry->email = $request->email;
            $AdmissionEnquiry->address = $request->address;
            $AdmissionEnquiry->student_dob = date('Y-m-d', strtotime($request->student_dob));
            $AdmissionEnquiry->added_by = $request->added_by;
            $AdmissionEnquiry->class_applying_for = $request->class;
            $AdmissionEnquiry->enquiry_date = date('Y-m-d', strtotime($request->enquiry_date));
            $AdmissionEnquiry->enquiry_mode_id = $request->enquiry_mode;
            $AdmissionEnquiry->previous_school = $request->previous_school;
            $AdmissionEnquiry->gender = $request->gender;
            $AdmissionEnquiry->parent_name = $request->parent_name;
            $AdmissionEnquiry->save();
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
        if (!Auth::user()->can('admission-enquiry-delete')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        try {
            AdmissionEnquiry::find($id)->delete();
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

    public function listenquirymode(){
        $response = EnquiryMode::get();
        return response()->json($response);
    }
}
