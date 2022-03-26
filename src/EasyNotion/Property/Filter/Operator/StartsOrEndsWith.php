<?php
namespace EasyNotion\Property\Filter\Operator;


trait StartsOrEndsWith 
{
    public function startsWith(mixed $val)
    {
        $this->{$this->type->value}->starts_with = $val;
        return $this;
    }

    public function endsWith(mixed $val)
    {
        $this->{$this->type->value}->ends_with = $val;
        return $this;
    }
}