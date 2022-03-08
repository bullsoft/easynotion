<?php
namespace EasyNotion\Property\Page;
use EasyNotion\Property\Type;

class Item
{
    public string $object = 'property_item';
    public string $id;
    public Type $type;
    public ?string $next_url;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->type = Type::from($map['type']);
        $this->next_url = $map['next_url'];
    }
}