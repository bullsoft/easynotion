<?php
namespace EasyNotion\Http;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Entity\Database as DbEntity;
class Database
{
    public function __construct(
        private HttpClient $client,
        private ?string $id
    )
    {
        
    }

    public function get()
    {
        if(!$this->id) {
            throw new \ValueError("database id is not specified");
        }
        $response = $this->client->get("databases/{$this->id}");
        $body = $response->getBody();
        $map = json_decode($body->getContents(), true);
        return new DbEntity($map);
    }
}