<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HumanResourceController extends Controller
{
    public function HrDashboard(){
        Auth::user()->email;
        return view('layouts.human_resource');
    }

    public function TeacherData(){
        $teacher = Teacher::all();

        $data = [
            'teacher' => $teacher,
        ];
        log::info($teacher);
        // Return the data as JSON response
        return response()->json($data);
     
    }
}
