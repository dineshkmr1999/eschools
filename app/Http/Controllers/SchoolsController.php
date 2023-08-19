<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Schools;
use Illuminate\Support\Facades\Hash;
class SchoolsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('school-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('headsuperadmin'))->withErrors($response);
        }
        return view('schools.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        if (!Auth::user()->can('school-create')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => ['required', 'regex:/^\d{10}$/'],
            'email' => 'required|email',
            'principal_name' => 'nullable|required|string',
            'founded_date' => 'nullable|required',
            'affiliation' => 'nullable|required',
            'website' => 'required',
            'description' => 'required',
            'admin_first_name' => 'required',
            'admin_last_name' => 'required',
            'admin_password' => 'required',
            "gender" => 'required',
            "admin_email"=>'required|email',
            "admin_phone_number"=> ['required', 'regex:/^\d{10}$/'],
            "admin_dob"=>'required',
            "admin_current_address"=>"required",
            "permanent_address"=>"required"
        ]);
   
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        try {
            $Schools = new Schools();
            $Schools->name = $request->name;
            $Schools->address = $request->address;
            $Schools->phone_number = $request->phone_number;
            $Schools->email = $request->email;
            $Schools->principal_name = $request->principal_name;
            $Schools->founded_date =  date('Y-m-d', strtotime($request->founded_date));
            $Schools->affiliation = $request->affiliation;
            $Schools->website = $request->website;
            $Schools->description = $request->description;
            $Schools->save();

            $schoolAdmin = new User ();
            $schoolAdmin->first_name = $request->admin_first_name;
            $schoolAdmin->last_name = $request->admin_last_name;
            $schoolAdmin->gender = $request->gender;
            $schoolAdmin->email = $request->admin_email;
            $schoolAdmin->mobile = $request->admin_phone_number;
            $schoolAdmin->dob = $request->admin_dob;
            $schoolAdmin->current_address = $request->admin_current_address;
            $schoolAdmin->permanent_address = $request->permanent_address;
            $schoolAdmin->password = Hash::make($request->admin_password);
            $schoolAdmin->school_id = $Schools->id;
            $schoolAdmin->save(); 

            $schoolAdmin->assignRole('Super Admin');

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
    
        if (!Auth::user()->can('school-list')) {
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
        
        $sql = Schools::with('userWithSuperAdminRole');
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('name', 'LIKE', "%$search%");
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
            
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-url=' . url('schools', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            
            
            $data = getSettings('date_formate');
           
            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['name'] = $row->name;
            $tempRow['address'] = $row->address;
            $tempRow['phone_number'] = $row->phone_number;
            $tempRow['email'] = $row->email;
            $tempRow['principal_name'] = $row->principal_name;
            $tempRow['founded_date'] = $row->founded_date;
            $tempRow['affiliation'] = $row->affiliation;
            $tempRow['website'] = $row->website;
            $tempRow['description'] = $row->description;
            $tempRow['status'] = $row->status;
            $tempRow['admin_name'] = $row->userWithSuperAdminRole->first_name. " ".$row->userWithSuperAdminRole->last_name;
            $tempRow['admin_email'] = $row->userWithSuperAdminRole->email;

            $tempRow['operate'] = $operate;
        
            $rows[] = $tempRow;
        }
        
        $bulkData['rows'] = $rows;
        Log::info($bulkData);
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
        if (!Auth::user()->can('school-edit')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => ['required', 'regex:/^\d{10}$/'],
            'email' => 'required|email',
            'principal_name' => 'required',
            'founded_date' => 'required',
            'affiliation' => 'required',
            'website' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        try {
            $Schools  = Schools::find($request->id);
            $Schools->name = $request->name;
            $Schools->address = $request->address;
            $Schools->phone_number = $request->phone_number;
            $Schools->email = $request->email;
            $Schools->principal_name = $request->principal_name;
            $Schools->founded_date =  date('Y-m-d', strtotime($request->founded_date));
            $Schools->affiliation = $request->affiliation;
            $Schools->website = $request->website;
            $Schools->description = $request->description;
            $Schools->status = $request->status;
            $Schools->save();
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
        if (!Auth::user()->can('school-delete')) {
            $response = array(
                'error' => true,
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        try {
            Schools::find($id)->delete();
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