<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class Competitor extends Model
{
    use HasFactory;

    // Specify fillable fields to allow mass assignment
    protected $fillable = ['name', 'website','shortname','price_class_name','status'];
    

    public static function getCompetitorNames()
    {
            return self::orderBy('id')->pluck('shortname','id')->toArray();
    }
}

