<?php
namespace EasyNotion\Entity\User\Type;
use EasyNotion\Entity\User\Owner;

class Bot
{
    public Owner $owner;

    public function __construct(array $map)
    {
        $this->owner = new Owner($map['owner']);
    }
}