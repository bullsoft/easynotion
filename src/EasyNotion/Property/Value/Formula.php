<?php

namespace EasyNotion\Property\Value;
use EasyNotion\Property\TypeFormula;

class Formula
{
    public TypeFormula $type;
    
    // type specific
    public ?string $string;
    public ?int $number;
    public ?bool $boolean;
    public ?Date $date;
}