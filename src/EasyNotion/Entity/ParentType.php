<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\TypeInterface;

enum ParentType: string implements TypeInterface
{
    case Page = 'page_id';
    case Database = 'database_id';
    case Workspace = 'workspace';

    public function resolve(array|string $val)
    {
    }
}