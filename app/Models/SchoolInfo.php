<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolInfo extends Model
{
    protected $guarded = [];

    public function educationalLevel()
    {
        return $this->belongsTo(EducationalLevel::class, 'educational_level_id');
    }
}
