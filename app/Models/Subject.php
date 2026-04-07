<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $casts = [
        'school_classes_id' => 'array',
    ];

    public function getSchoolClassesAttribute()
    {
        $ids = $this->school_classes_id ?? [];
        return \App\Models\SchoolClass::whereIn('id', $ids)->get();
    }
}
