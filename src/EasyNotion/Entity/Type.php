<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\TypeInterface;

enum Type: string implements TypeInterface
{
    case Database = 'database';
    case Page = 'page';
    case Block = 'block';
    case User = 'user';
    case PropertyItem = 'property_item';
    case PageOrDatabase = 'page_or_database';

    public function resolve(array $map)
    {
        return match($this) {
            self::Database => new Database($map),
            self::Page  => new Page($map),
            self::Block => new Block($map),
            self::User  => new User($map),
            self::PropertyItem => new PropertyItem($map),
        };
    }
}