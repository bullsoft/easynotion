<?php
namespace EasyNotion\Property\Page;
use EasyNotion\Property\Database\Type as DbType;

class Item
{
    public string $object = 'property_item';
    public string $id;
    public DbType $type;
    public ?string $next_url;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->type = DbType::from($map['type']);
        $this->next_url = $map['next_url'];
    }
}