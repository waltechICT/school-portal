<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SchoolClass;
class Subject extends Model
{
    protected $casts = [
        'school_classes_id' => 'array',
    ];

    public function getSchoolClassesAttribute()
    {
        $ids = $this->school_classes_id ?? [];
        return SchoolClass::whereIn('id', $ids)->where('is_enabled','1')->get();
    }

}
