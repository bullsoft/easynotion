<?php

namespace EasyNotion\Property\Value;

class Date
{
    public string $start;
    public ?string $end;
    public ?string $time_zone;

    public function __construct(?array $map)
    {
        $this->start = $map['start'];
        $this->end = $map['end'] ?? null;
        $this->time_zone = $map['time_zone'] ?? null;
    }

}