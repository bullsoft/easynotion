<?php
namespace EasyNotion\Property\Filter\Operator;


trait GreaterOrLess 
{
    public function greaterThan(mixed $val)
    {
        $this->{$this->type->value}->greater_than = $val;
        return $this;
    }

    public function lessThan(mixed $val)
    {
        $this->{$this->type->value}->less_than = $val;
        return $this;
    }

    public function greaterThanOrEqualTo(mixed $val)
    {
        $this->{$this->type->value}->greater_than_or_equal_to = $val;
        return $this;
    }

    public function lessThanOrEqualTo(mixed $val)
    {
        $this->{$this->type->value}->less_than_or_equal_to = $val;
        return $this;
    }   
}