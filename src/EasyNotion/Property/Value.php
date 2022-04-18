<?php
namespace EasyNotion\Property;

use EasyNotion\Common\Base;
use EasyNotion\Common\UnionInterface;

class Value extends Base implements UnionInterface
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

    public function id(): string
    {
        return $this->id;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function type(): Type
    {
        return $this->type;
    }
}