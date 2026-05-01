<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionKey extends Model
{
    protected $fillable = ['key', 'is_used'];
}
