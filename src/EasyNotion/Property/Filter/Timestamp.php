<?php
namespace EasyNotion\Property\Filter;
use EasyNotion\Property\Configuration;
use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Type\{
    Date
};

class Timestamp implements \JsonSerializable
{
    public string $timestamp;
    public ?Date $created_time;
    public ?Date $last_edited_time;

    private Type $type;

    public function __construct(Type $type)
    {
        $this->type = $type;
        
        $key = $this->type->value;
        $this->timestamp = $key;

        $this->{$key} = new Date($this->type);
    }


    public function __call(string $method, array $args)
    {
        $key = $this->type->value;
        call_user_func_array([$this->{$key}, $method], $args);
        return $this;
    }

    public function __toArray()
    {
        $key = $this->type->value;
        return [
            "timestamp" => $this->timestamp
        ] + $this->{$key}->getValue();
    }


    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->__toArray();
    }
}