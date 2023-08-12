<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionEnquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'admission_number',
        'student_name',
        'phone_number',
        'email',
        'address',
        'added_by',
        'enquiry_date',
        'enquiry_mode_id'
    ];

    public function enquiryMode()
    {
        return $this->belongsTo(EnquiryMode::class);
    }
}
