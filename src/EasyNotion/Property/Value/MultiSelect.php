<?php
namespace EasyNotion\Property\Value;

class MultiSelect
{
    public array $options;

    public function __construct(array $list)
    {
        foreach($list as $select) {
            $this->options[] = new Select($select);
        }
    }
}