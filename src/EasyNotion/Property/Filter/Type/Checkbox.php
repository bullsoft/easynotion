<?php
namespace EasyNotion\Property\Filter\Type;

use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Operator\{
    EqualsOrNot,
};

class Checkbox extends AbstractType
{
  
    use EqualsOrNot;

    public ?\stdClass $checkbox;
}