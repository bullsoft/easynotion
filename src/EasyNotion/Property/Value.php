<?php

namespace EasyNotion\Property;

class Value
{
    use BaseValue;

    public string $id;
    public ?Type $type;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->type = Type::from($map['type']);
        $this->setValue($map);
    }
}