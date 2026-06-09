<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
        'name',
        'is_active'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
