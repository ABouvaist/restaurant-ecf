<?php

namespace Database\Factories;

use App\Models\OpeningHours;
use App\Time\TimeRange;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OpeningHoursFactory extends Factory
{
    protected $model = OpeningHours::class;

    public function definition(): array
    {
        return [
            'monday' => [TimeRange::fromString('8:00-12:00'), TimeRange::fromString('19:00-21:00')],
            'thursday' => [TimeRange::fromString('8:00-12:00')],
            'wednesday' => [TimeRange::fromString('8:00-12:00')],
            'tuesday' => [TimeRange::fromString('8:00-12:00')],
            'friday' => [TimeRange::fromString('8:00-12:00')],
            'saturday' => [TimeRange::fromString('8:00-12:00')],
            'sunday' => [TimeRange::fromString('8:00-12:00')],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
