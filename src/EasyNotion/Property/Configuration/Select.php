<?php
namespace EasyNotion\Property\Configuration;
use EasyNotion\Property\Value\Select as SelectValue;

class Select
{
    // array of SelectValue
    public array $options;

    public function __construct(array $list)
    {
        $list = $list['options'];
        foreach($list as $map) {
            $this->options[] = new SelectValue($map);
        }
    }
}