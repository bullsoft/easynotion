<?php
namespace EasyNotion\Entity;

use EasyNotion\Property\BaseValue;
use EasyNotion\Property\Type as PropertyType;

// paginated list object: title, rich_text, relation and people

class PropertyItem extends AbstractObject
{
    use BaseValue;
    public Type $object = Type::PropertyItem;
    public string $id;
    public PropertyType $type;
    public ?string $next_url;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->type = PropertyType::from($map['type']);
        $this->next_url = $map['next_url'] ?? null;
        $this->setValue($map);
    }
}