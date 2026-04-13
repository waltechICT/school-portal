<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arm extends Model
{
    protected $fillable = ['name', 'is_enabled'];

    public function students()
    {
        return $this->hasMany(Student::class, 'arm_id');
    }
}
