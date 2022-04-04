<?php
namespace EasyNotion\Entity;
use EasyNotion\Common\UUIDv4;

class PartialUser extends AbstractObject
{
    public Type $object;
    public UUIDv4 $id;

    public function __construct(string|array|Type $object, ?string $id = null)
    {
        if(is_string($object)) {
            $this->object = Type::from($object);
            $this->id = new UUIDv4($id);
        } elseif(is_array($object)) {
            $map = $object;
            $this->object = Type::from($map['object']);
            $this->id = new UUIDv4($map['id']);
        } else {
            $this->object = $object;
            $this->id = new UUIDv4($id);
        }
    }

    public function resolve(array $map)
    {
        return new User($map);
    }
}