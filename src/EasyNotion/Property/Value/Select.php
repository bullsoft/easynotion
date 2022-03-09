<?php
namespace EasyNotion\Property\Value;
use EasyNotion\Property\TypeColor;

class Select
{
    public string $id;
    public string $name;
    public TypeColor $color = TypeColor::Default;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->name = $map['name'];
        $this->color = TypeColor::from($map['color']);
    }
}