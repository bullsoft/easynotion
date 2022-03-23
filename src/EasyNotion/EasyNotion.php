<?php
namespace EasyNotion;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Http\Client;
use EasyNotion\Http\{Database, User, Page, Block, Property};
use EasyNotion\Entity\Page as EntityPage;

class EasyNotion
{
    protected Client $client;

    public function __construct(string $token, $apiVersion = 'v1')
    {
        $config = [
            'base_uri' => 'https://api.notion.com'."/{$apiVersion}/",
            'timeout'  => 3.0,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Notion-Version' => '2022-02-22',
            ]
        ];
        $this->client = new Client(new HttpClient($config));
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