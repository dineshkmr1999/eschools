<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AdmissionEnquiry extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'admission_number',
        'student_name',
        'phone_number',
        'student_dob',
        'email',
        'address',
        'added_by',
        'class',
        'enquiry_date',
        'enquiry_mode_id',
        'previous_school',
        'gender',
        'language_of_medium',
        'parent_name'
    ];

    public function enquiryMode()
    {
        return $this->belongsTo(EnquiryMode::class);
    }
}
