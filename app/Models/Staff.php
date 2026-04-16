<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'sex',
        'password',
        'role',        // Ensure this matches your DB column name exactly
        'photo',
        'is_enabled'
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Accessor for photo URL
     */
    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }
} // Added missing class closing brace
