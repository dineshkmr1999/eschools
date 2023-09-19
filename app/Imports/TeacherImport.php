<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class  TeacherImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {   
        Log::info($rows);
        $validator = Validator::make($rows->toArray(), [
            '*.first_name' => 'required',
            '*.last_name' => 'required',
            '*.mobile' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
            '*.gender' => 'required',
            '*.dob' => 'required|date',
            '*.current_address' => 'required',
            '*.permanent_address' => 'required',
            '*.qualification' => 'required',
        ]);

        $validator->validate();
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        foreach ($rows as $row) 
        {
           $user = User::create([
                'first_name' => $row["first_name"],
                'last_name' => $row["last_name"],
                'gender' => $row["gender"],
                'email' => $row["email"],
                $teacher_plain_text_password = str_replace('-', '', date('d-m-Y', strtotime($row["dob"]))),
                'password' => Hash::make($teacher_plain_text_password),

                'mobile' => $row["mobile"],
                'dob' => $row["dob"],
              
                'current_address' => $row["current_address"],
                'permanent_address' => $row["permanent_address"],
            ]);

            Teacher::create([
                'user_id' => $user->id,
                'qualification' => $row["qualification"],
            ]);
        }
    }
   
    public function startRow(): int
    {
        return 2;
    }
}
