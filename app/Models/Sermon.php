<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'date', 
        'scripture',
        'speaker', 
        'image', 
        'video_url', 
        'audio_url', 
        'is_enabled'
    ];
}
