<?php
namespace EasyNotion\Property\Filter\Type;
use EasyNotion\Property\Type;

abstract class AbstractType implements \JsonSerializable
{
    public function __construct(protected Type $type)
    {
        $this->{$this->type->value} = new \stdClass();
    }

    public function getValue()
    {
        $key = $this->type->value;
        return [
            $key => $this->{$key}
        ];
    }

    public function __toArray()
    {
        return $this->getValue();
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->getValue();
    }
}