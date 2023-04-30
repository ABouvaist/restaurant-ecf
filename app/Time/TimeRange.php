<?php

namespace App\Time;

class TimeRange {
    protected Time $start;
    protected Time $end;

    public function __construct(Time $start, Time $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public static function fromString(string $timeRange): TimeRange
    {
        str_replace(' ', '', $timeRange);
        [$start, $end] = explode('-', $timeRange);
        $start = Time::fromString($start);
        $end = Time::fromString($end);
        return new TimeRange($start, $end);
    }

    public function getStart(): Time
    {
        return $this->start;
    }

    public function getEnd(): Time
    {
        return $this->end;
    }

    public function setStart(Time $start): void
    {
        $this->start = $start;
    }

    public function setEnd(Time $end): void
    {
        $this->end = $end;
    }

    public function __toString(): string
    {
        return sprintf('%s - %s', $this->start, $this->end);
    }
}
