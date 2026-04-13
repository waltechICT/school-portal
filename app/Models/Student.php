<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'admission_no',
        'surname',
        'other_names',
        'class_id',
        'arm_id',
        'sex',
        'date_of_birth',
        'guardian_name',
        'guardian_phone',
        'guardian_address',
        'guardian_occupation',
        'student_passport',
        'is_enabled',
    ];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function arm()
    {
        return $this->belongsTo(Arm::class, 'arm_id');
    }
}
