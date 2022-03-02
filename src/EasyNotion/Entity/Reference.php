<?php
namespace EasyNotion\Entity;

class Reference
{
    public Type $object;
    public string $id;

    public function __construct(Type $object, string $id)
    {
        $this->object = $object;
        $this->id = $id;
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