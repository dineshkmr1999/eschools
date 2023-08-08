<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class  TeacherImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
           $user = User::create([
                'first_name' => $row[0],
                'last_name' => $row[1],
                'gender' => $row[2],
                'email' => $row[3],
                $teacher_plain_text_password = str_replace('-', '', date('d-m-Y', strtotime($row[5]))),
                'password' => Hash::make($teacher_plain_text_password),

                'mobile' => $row[4],
                'dob' => $row[5],
              
                'current_address' => $row[6],
                'permanent_address' => $row[7],
            ]);

            Teacher::create([
                'user_id' => $user->id,
                'qualification' => $row[8],
            ]);
        }
    }
    
}
