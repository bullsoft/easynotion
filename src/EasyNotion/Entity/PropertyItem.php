<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\RichTextObject;
use EasyNotion\Property\Type as PropertyType;
use EasyNotion\Property\Type\Select;

class PropertyItem extends AbstractObject
{
    public Type $object = Type::PropertyItem;
    public string $id;
    public PropertyType $type;

    // type specificed
    public RichTextObject $title;
    public $relation;
    public RichTextObject $rich_text;
    public int $number;
    public Select $select;
    
}