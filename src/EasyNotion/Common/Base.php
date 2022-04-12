<?php
namespace EasyNotion\Common;

class Base implements \JsonSerializable
{
    public function __debugInfo()
    {
        $debug = [];
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties();
        foreach ($props as $prop) {
            if($prop->isInitialized($this) && $prop->getName() !== 'client') {
                $debug[$prop->getName()] = $prop->getValue($this);
            }
        }
        return $debug;
    }

    public function jsonSerialize(): mixed
    {
        return $this->__debugInfo();
    }
}