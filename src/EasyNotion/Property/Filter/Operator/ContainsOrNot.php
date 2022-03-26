<?php
namespace EasyNotion\Property\Filter\Operator;


trait ContainsOrNot 
{
    public function contains(mixed $val)
    {
        $this->{$this->type->value}->contains = $val;
        return $this;
    }

    public function doesNotContain(mixed $val)
    {
        $this->{$this->type->value}->does_not_contain = $val;
        return $this;
    }
}