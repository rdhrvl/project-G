<?php

namespace App\Models;

use App\Models\Major;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Student extends Model
{
    protected $fillable = [
        'major_id',
        'name',
        'phone'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }
}
