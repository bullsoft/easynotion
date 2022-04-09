<?php
namespace EasyNotion\Http;

use EasyNotion\Http\Response\Collection;
use EasyNotion\Http\Client;
use EasyNotion\Entity\{User, Database, Page, PropertyItem, Block};

class Factory
{
    public static function make(array $data, Client $client)
    {
        return match($data['object']) {
            'list' => new Collection($data, $client),
            'user' => new User($data),
            'database' => new Database($data),
            'page' => new Page($data),
            'property_item' => new PropertyItem($data),
            'block' => new Block($data),
        };
    }
}