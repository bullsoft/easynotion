<?php

namespace EasyNotion\Property\Type;

class Formula
{
    public string $type;
    
    public ?string $string;
    public ?int $number;
    public ?bool $boolean;
    public ?Date $date;
}