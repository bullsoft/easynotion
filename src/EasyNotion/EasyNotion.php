<?php
namespace EasyNotion;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Http\{Database, User, Page, Block, Property};
use EasyNotion\Entity\Page as EntityPage;

class EasyNotion
{
    protected HttpClient $client;

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
        $this->client = new HttpClient($config);
    }

    public function database(?string $id = null)
    {
        return new Database($this->client, $id);
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