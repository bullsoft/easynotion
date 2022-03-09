<?php
namespace EasyNotion\Property\Value;

class MultiSelect
{
    public array $list;

    public function __construct(array $list)
    {
        foreach($list as $select) {
            $this->list[] = new Select($select);
        }
    }
}