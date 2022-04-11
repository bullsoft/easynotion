<?php
namespace EasyNotion\Entity;
use EasyNotion\Common\UUIDv4;
use EasyNotion\Http\Client;

abstract class AbstractObject 
{
    protected Type $object;
    protected readonly UUIDv4|string $id;

    public function type(): Type
    {
        return $this->object;
    }

    public function object(): Type
    {
        return $this->object;
    }

    public function id(): UUIDv4|string
    {
        return $this->id;
    }

    public function __debugInfo() 
    {
        $debug = get_object_vars($this);
        unset($debug['client']);
        return $debug;
    }
}