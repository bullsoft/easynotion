<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\TypeInterface;

enum Type: string implements TypeInterface
{
    case Database = 'database';
    case Page = 'page';
    case Block = 'block';
    case List = 'list';
    case User = 'user';
    case PropertyItem = 'property_item';
    case PageOrDatabase = 'page_or_database';

    public function resolve(array|string $val)
    {
    }
}