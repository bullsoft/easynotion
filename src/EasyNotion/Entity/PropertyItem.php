<?php
namespace EasyNotion\Entity;

use EasyNotion\Property\Database\Type as DbType;

class PropertyItem extends AbstractObject
{
    public Type $property_item = Type::PropertyItem;
    public string $id;
    public DBType $type;

    // type specificed
    public $relation;
    
}