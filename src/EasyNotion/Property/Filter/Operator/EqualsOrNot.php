<?php
namespace EasyNotion\Property\Filter\Operator;

trait EqualsOrNot 
{
    public function equals(mixed $val)
    {
        $this->{$this->type->value}->equals = $val;
        return $this;
    }

    public function doesNotEqual(mixed $val)
    {
        $this->{$this->type->value}->does_not_equal = $val;
        return $this;
    }
}