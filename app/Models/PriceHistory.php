<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceHistory extends Model
{
    protected $table = 'activity_feeds';
    protected $fillable = [
        'model_id',
        'moderator_id',
        'price_old',
        'price_new',
        'type',
        'created_at',
    ];
    public $timestamps = false; // Assuming created_at is managed manually
} 