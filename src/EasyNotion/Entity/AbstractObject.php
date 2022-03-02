<?php
namespace EasyNotion\Entity;
use EasyNotion\Entity\Type;
abstract class AbstractObject 
{
    protected Type $object;
    protected string $id;
}