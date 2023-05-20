<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Casts\TimeRange;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHours extends Model
{
    use HasFactory;
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
            get: static fn ($value) => json_decode($value, true, 512, JSON_THROW_ON_ERROR),
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

    public function toArray(): array
    {
        return [
            'monday' => $this->monday,
            'thursday' => $this->thursday,
            'wednesday' => $this->wednesday,
            'tuesday' => $this->tuesday,
            'friday' => $this->friday,
            'saturday' => $this->saturday,
            'sunday' => $this->sunday,
        ];
    }
}
