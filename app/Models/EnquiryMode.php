<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryMode extends Model
{
    use HasFactory;
    protected $fillable = [
        'mode_name'
    ];

    public function admissionEnquiries()
    {
        return $this->hasMany(AdmissionEnquiry::class, 'enquiry_mode_id');
    }
}
