<?php
namespace EasyNotion\Property\Filter\Type;

use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Operator\{
    ContainsOrNot,
    EmptyOrNot,
};

class People extends AbstractType
{
    use ContainsOrNot, EmptyOrNot;

    public ?\stdClass $people;
    public ?\stdClass $created_by;
    public ?\stdClass $last_edited_by;
}