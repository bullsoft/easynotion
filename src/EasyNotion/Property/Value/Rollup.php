<?php
namespace EasyNotion\Property\Value;
use EasyNotion\Property\{
    TypeRollup, TypeFunction,
};

class Rollup
{
    public TypeRollup $type;
    public TypeFunction $function;

    public int $number;
    public Date $date;
    // array of PropertyItem
    public array $results;
    public ?\stdClass $incomplete;
}