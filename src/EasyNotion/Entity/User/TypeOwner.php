<?php
namespace EasyNotion\Entity\User;

use EasyNotion\Common\TypeInterface;

enum TypeOwner: string implements TypeInterface
{
    case User = 'user';
    case Workspace = 'workspace';

    public function resolve(array|string $val)
    {
    }
}