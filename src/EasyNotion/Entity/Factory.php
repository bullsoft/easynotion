<?php

namespace EasyNotion\Entity;

use EasyNotion\Http\Response\Collection;
use EasyNotion\Entity\{User, Database, Page};

class Factory
{
    public static function make(array $data): AbstractObject | Collection
    {
        return match($data['object']) {
            'list' => new Collection($data),
            'user' => new User($data),
            'database' => new Database($data),
            'page' => new Page($data)
        };
    }
}