<?php
namespace EasyNotion\Entity\Block;

class Collection
{
    public array $list;

    public function __construct(array $list)
    {
        foreach($list as $val) {
            $this->list[] = Element::create($val);
        }
    }
}