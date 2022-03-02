<?php
namespace EasyNotion;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Http\Database;

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
                'Notion-Version' => '2021-08-16',
            ]
        ];
        $this->client = new HttpClient($config);
    }

    public function database(?string $id = null)
    {
        return new Database($this->client, $id);
    }
}