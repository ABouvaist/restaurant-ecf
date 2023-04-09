<?php

namespace App\Models;

use App\Casts\TimeRange;
use Illuminate\Database\Eloquent\Model;

class OpeningHours extends Model
{
    protected $fillable = [
        'monday',
        'thursday',
        'wednesday',
        'tuesday',
        'friday',
        'saturday',
        'sunday',
    ];

    protected $casts = [
        'monday' => TimeRange::class,
        'thursday' => TimeRange::class,
        'wednesday' => TimeRange::class,
        'tuesday' => TimeRange::class,
        'friday' => TimeRange::class,
        'saturday' => TimeRange::class,
        'sunday' => TimeRange::class,
    ];
}
