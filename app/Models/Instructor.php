<?php

namespace App\Models;

use App\Models\Major;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'major_id',
        'name',
        'phone',
        'email',
        'password',
        'user_id'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }
}
