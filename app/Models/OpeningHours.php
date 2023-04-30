<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    private function makeAttribute(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => json_decode($value, true),
        );
    }

    protected function monday(): Attribute
    {
        return $this->makeAttribute();
    }

    protected function thursday(): Attribute
    {
        return $this->makeAttribute();
    }

    protected function wednesday(): Attribute
    {
        return $this->makeAttribute();
    }

    protected function tuesday(): Attribute
    {
        return $this->makeAttribute();
    }

    protected function friday(): Attribute
    {
        return $this->makeAttribute();
    }

    protected function saturday(): Attribute
    {
        return $this->makeAttribute();
    }

    protected function sunday(): Attribute
    {
        return $this->makeAttribute();
    }
}
