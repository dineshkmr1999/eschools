<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Schools extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function userWithSuperAdminRole()
    {
        return $this->hasOne(User::class, 'school_id')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'Super Admin');
            });
    }

}
