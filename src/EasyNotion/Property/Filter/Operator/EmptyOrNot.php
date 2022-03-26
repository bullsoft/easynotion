<?php
namespace EasyNotion\Property\Filter\Operator;


trait EmptyorNot 
{
    public function isEmpty()
    {
        $this->{$this->type->value}->is_empty = true;
        return $this;
    }

    public function isNotEmpty()
    {
        $this->{$this->type->value}->is_not_empty = true;
        return $this;
    }
}