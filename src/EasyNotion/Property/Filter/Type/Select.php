<?php
namespace EasyNotion\Property\Filter\Type;

use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Operator\{
    EqualsOrNot,
    EmptyOrNot,
};

class Select extends AbstractType
{
    use EqualsOrNot, EmptyOrNot;

    public ?\stdClass $select;
}