<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\UUIDv4;

abstract class AbstractObject 
{
    protected Type $object;
    protected UUIDv4 $id;
}