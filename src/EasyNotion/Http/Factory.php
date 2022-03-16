<?php

namespace EasyNotion\Http;

use EasyNotion\Http\Response\Collection;
use EasyNotion\Entity\{User, Database, Page, PropertyItem, Block};

class Factory
{
    public static function make(array $data)
    {
        return match($data['object']) {
            'list' => new Collection($data),
            'user' => new User($data),
            'database' => new Database($data),
            'page' => new Page($data),
            'property_item' => new PropertyItem($data),
            'block' => new Block($data),
        };
    }
}