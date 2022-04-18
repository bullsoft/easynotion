<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\Base;
use EasyNotion\Common\UUIDv4;

abstract class AbstractObject extends Base
{
    protected Type $object;
    protected readonly UUIDv4|string $id;

    public function object(): Type
    {
        return $this->object;
    }

    public function id(): UUIDv4|string
    {
        return $this->id;
    }
}