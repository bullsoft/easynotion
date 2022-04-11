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
            'user' => new User($data, $client),
            'database' => new Database($data, $client),
            'page' => new Page($data, $client),
            'property_item' => new PropertyItem($data, $client),
            'block' => new Block($data, $client),
        };
    }
}