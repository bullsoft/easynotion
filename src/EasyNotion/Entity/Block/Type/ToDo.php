<?php
namespace EasyNotion\Entity\Block\Type;

class ToDo extends Base
{
    public bool $checked;
    public function __construct(array $map)
    {
        parent::__construct($map);
        $this->checked = $map['checked'];
    }
}