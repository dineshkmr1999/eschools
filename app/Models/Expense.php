<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'expenses';
    protected $hidden = ["deleted_at", "created_at", "updated_at"];

    protected $fillable = [
        'name', 'description', 'cost',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
