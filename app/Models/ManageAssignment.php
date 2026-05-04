<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageAssignment extends Model
{
    protected $fillable = [
      'id',
        'school_class_id',
        'subject_id',
        'note',
        'submittion_date',
        'image',
        'is_enabled',
        'staff_id',
    ];

        public function staff()
        {
            return $this->belongsTo(Staff::class, 'staff_id');
        }
    
        public function subject()
        {
            return $this->belongsTo(Subject::class, 'subject_id');
        }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_classes_id');
    }

  

    // image
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
