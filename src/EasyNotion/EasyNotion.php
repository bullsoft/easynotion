<?php
namespace EasyNotion;
use EasyNotion\Http\Client;
use EasyNotion\Http\{Database, User, Page, Block, Property};
use EasyNotion\Entity\Page as EntityPage;

class EasyNotion
{
    protected Client $client;

    public function __construct(string $token, string $version = '2022-02-22', string $apiVersion = 'v1')
    {
        $options = [
            'token' => $token,
            'apiVersion' => $apiVersion,
            'version' => $version,
        ];
        $this->client = new Client($options);
    }

    public function database()
    {
        return new Database($this->client);
    }

    public function page()
    {
        return new Page($this->client);
    }

    public function user()
    {
        return new User($this->client);
    }

    public function block()
    {
        return new Block($this->client);
    }

    public function property(EntityPage $page)
    {
        return new Property($this->client, $page);
    }
}