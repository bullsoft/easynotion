<?php
namespace EasyNotion\Property\Type;
use EasyNotion\Property\Color;

class Select
{
    public string $id;
    public string $name;
    public Color $color = Color::Default;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->name = $map['name'];
        $this->color = Color::from($map['color']);
    }
}