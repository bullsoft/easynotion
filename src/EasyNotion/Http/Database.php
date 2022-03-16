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
        $uri = "databases/{$this->id}";
        $response = $this->client->get($uri);
        $res = new Response($response);
        return $res->getValue();
    }
}