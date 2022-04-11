<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\UnionInterface;
use EasyNotion\Common\UUIDv4;
use EasyNotion\Http\Client;
use EasyNotion\Property\BaseValue;
use EasyNotion\Property\Type as PropertyType;

class PropertyItem extends AbstractObject implements UnionInterface
{
    use BaseValue;

    // Entity Type
    protected Type $object = Type::PropertyItem;
    // string
    protected readonly UUIDv4|string $id;

    public PropertyType $type;
    public ?string $next_url;

    public function __construct(array $map, public readonly ?Client $client = null)
    {
        $this->id = $map['id'];
        $this->type = PropertyType::from($map['type']);
        if(isset($map['next_url'])) {
            $this->next_url = $map['next_url'];
        }
        $this->setValue($map);
    }
}