<?php
namespace EasyNotion\Entity\User;

use EasyNotion\Common\TypeInterface;

enum Type: string implements TypeInterface
{
    case Person = 'person';
    case Bot = 'bot';

    public function resolve(array|string $val)
    {
    }
}