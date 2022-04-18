<?php
namespace EasyNotion\Http;

use EasyNotion\Http\Client;
use EasyNotion\Entity\{User, Database, Page, PropertyItem, Block, EntityList};

class Factory
{
    public static function make(array $data, Client $client)
    {
        return match($data['object']) {
            'list' => new EntityList($data, $client),
            'user' => new User($data, $client),
            'database' => new Database($data, $client),
            'page' => new Page($data, $client),
            'property_item' => new PropertyItem($data, $client),
            'block' => new Block($data, $client),
        };
    }
}