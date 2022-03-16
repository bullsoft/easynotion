<?php
namespace EasyNotion\Http;
use GuzzleHttp\Client as HttpClient;
class Block
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
            throw new \ValueError("page id is not specified");
        }
        $uri = "blocks/{$this->id}";
        $response = $this->client->get($uri);
        $res = new Response($response);
        return $res->getValue();   
    }

    public function children()
    {
        if(!$this->id) {
            throw new \ValueError("page id is not specified");
        }
        $uri = "blocks/{$this->id}/children";
        $response = $this->client->get($uri);
        $res = new Response($response);
        return $res->getValue();
    }
}