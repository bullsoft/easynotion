<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\UnionInterface;
use EasyNotion\Common\UUIDv4;
use EasyNotion\Property\BaseValue;
use EasyNotion\Property\Type as PropertyType;

class PropertyItem extends AbstractObject implements UnionInterface
{
    use BaseValue;
    public Type $object = Type::PropertyItem;
    public UUIDv4 $id;
    public PropertyType $type;
    public ?string $next_url;

    public function __construct(array $map)
    {
        $this->id = new UUIDv4($map['id']);
        $this->type = PropertyType::from($map['type']);
        if(isset($map['next_url'])) {
            $this->next_url = $map['next_url'];
        }
        $this->setValue($map);
    }
}