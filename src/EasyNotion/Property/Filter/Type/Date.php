<?php
namespace EasyNotion\Property\Filter\Type;

use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Operator\{
    EqualsOrNot,
    EmptyOrNot,
};

class Date extends AbstractType
{
    use EqualsOrNot, EmptyOrNot;

    public ?\stdClass $date;
    public ?\stdClass $created_time;
    public ?\stdClass $last_edited_time;

    public function before($val)
    {
        $this->{$this->type->value}->before = $val;
        return $this;
    }

    public function after($val)
    {
        $this->{$this->type->value}->after = $val;
        return $this;
    }

    public function onOrBefore($val)
    {
        $this->{$this->type->value}->on_or_before = $val;
        return $this;
    }

    public function onOrAfter($val)
    {
        $this->{$this->type->value}->on_or_after = $val;
        return $this;
    }

    public function pastWeek()
    {
        $this->{$this->type->value}->past_week = new \stdClass();
        return $this;
    }

    public function pastMonth()
    {
        $this->{$this->type->value}->past_month = new \stdClass();
        return $this;
    }

    public function pastYear()
    {
        $this->{$this->type->value}->past_year = new \stdClass();
        return $this;
    }
    
    public function nextWeek()
    {
        $this->{$this->type->value}->next_week = new \stdClass();
        return $this;
    }

    public function nextMonth()
    {
        $this->{$this->type->value}->next_month = new \stdClass();
        return $this;
    }

    public function nextYear()
    {
        $this->{$this->type->value}->next_year = new \stdClass();
        return $this;
    }   

}