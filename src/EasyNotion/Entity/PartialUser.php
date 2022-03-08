<?php
namespace EasyNotion\Entity;

class PartialUser extends AbstractObject
{
    public Type $object;
    public string $id;

    public function __construct(string|array|Type $object, ?string $id = null)
    {
        if(is_string($object)) {
            $this->object = Type::from($object);
            $this->id = $id;
        } elseif(is_array($object)) {
            $map = $object;
            $this->object = Type::from($map['object']);
            $this->id = $map['id'];
        } else {
            $this->object = $object;
            $this->id = $id;
        }
    }

    public function resolve()
    {
        return match($this->object) {
            Type::Page => '',
            Type::Database => '',
            Type::Block => '',
            Type::User => ''
        };
    }
}