<?php

namespace App\Models; // Must be plural 'Models' to match Laravel's folder structure

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * Use this if your table is named 'assessment' (singular).
     */
    protected $table = 'assessment';

    /**
     * The attributes that are mass assignable.
     * This allows your Controller's store() and update() methods to save these fields.
     */
    protected $fillable = [
        'name',
        'title',
        'is_enabled',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'is_enabled' => 'boolean',
    ];
}