<?php
namespace EasyNotion\Property\Filter\Type;

use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Operator\{
    EmptyOrNot,
};

class Files extends AbstractType
{
    use EmptyOrNot;

    public ?\stdClass $files;
}