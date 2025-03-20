<?php

use App\Models\Competitor; // Import the model
use Illuminate\Support\Facades\Cache;

if (!function_exists('getCompetitorNames')) {
    // function getCompetitorNames()
    // {
    //     return Cache::remember('competitor_names', 1800, function () {
    //         return Competitor::orderBy('id')->pluck('name')->toArray();
    //     });
    // }
}

