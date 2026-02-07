<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\TypeInterface;
use EasyNotion\Http\Client;

enum Type: string implements TypeInterface
{
    case Database = 'database';
    case Page = 'page';
    case Block = 'block';
    case List = 'list';
    case User = 'user';
    case PropertyItem = 'property_item';
    case PageOrDatabase = 'page_or_database';

    public function resolve(array|string $val, ?Client $client = null): User|Database|Page|PropertyItem|Block|EntityList
    {
        return match($this) {
            self::User => new User($val, $client),
            self::Database => new Database($val, $client),
            self::Page => new Page($val, $client),
            self::Block => new Block($val, $client),
            self::PropertyItem => new PropertyItem($val, $client),
            self::List => new EntityList($val, $client),
            self::PageOrDatabase => isset($val['object']) ? self::from($val['object'])->resolve($val, $client) : new Page($val, $client),
        };
    }
}