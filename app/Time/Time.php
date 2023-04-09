<?php

namespace App\Time;
class Time
{
    protected int $hours;
    protected int $minutes;

    protected function __construct(int $hours, int $minutes)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    public static function fromString(string $time): Time
    {
        [$hours, $minutes] = explode(':', $time);
        $hours = (int) $hours;
        $minutes = (int) $minutes;
        return new Time($hours, $minutes);
    }

    public function getHours(): int
    {
        return $this->hours;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }

    public function setHours(int $hours): void
    {
        $this->hours = $hours;
    }

    public function setMinutes(int $minutes): void
    {
        $this->minutes = $minutes;
    }

    public function __toString(): string
    {
        return sprintf('%02d:%02d', $this->hours, $this->minutes);
    }
}
