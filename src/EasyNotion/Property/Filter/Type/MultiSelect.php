<?php
namespace EasyNotion\Property\Filter\Type;

use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Operator\{
    ContainsOrNot,
    EmptyOrNot,
};

class MultiSelect extends AbstractType
{
    use ContainsOrNot, EmptyOrNot;

    public ?\stdClass $multi_select;
}