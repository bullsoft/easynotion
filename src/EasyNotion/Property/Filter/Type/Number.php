<?php
namespace EasyNotion\Property\Filter\Type;

use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Operator\{
    EqualsOrNot,
    GreaterOrLess,
    EmptyOrNot,
};

class Number extends AbstractType
{
  
    use EqualsOrNot, GreaterOrLess, EmptyOrNot;

    public ?\stdClass $number;
}