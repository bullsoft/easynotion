<?php
namespace EasyNotion\Property\Filter\Type;

use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Operator\{
    EqualsOrNot,
    EmptyOrNot,
};

class Rollup extends AbstractType
{
    use EqualsOrNot, EmptyOrNot;
    
    public ?\stdClass $rollup;
    public ?\stdClass $created_time;
    public ?\stdClass $last_edited_time;

    public function any(Text $val)
    {
        $this->{$this->type->value}->any = $val;
        return $this;
    }

    public function every(Text $val)
    {

        $this->{$this->type->value}->every = $val;
        return $this;
    }

    public function none(Text $val)
    {
        $this->{$this->type->value}->none = $val;
        return $this;
    }

    public function number(Number $val)
    {
        $this->{$this->type->value}->number = $val;
        return $this;
    }

    public function date(Date $val)
    {
        $this->{$this->type->value}->date = $val;
        return $this;
    }
}