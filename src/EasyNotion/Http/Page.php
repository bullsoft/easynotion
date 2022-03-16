<?php
namespace EasyNotion\Http;
use GuzzleHttp\Client as HttpClient;
class Page
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
        $uri = "pages/{$this->id}";
        $response = $this->client->get($uri);
        $res = new Response($response);
        return $res->getValue();
    }

    public function property(string $id) 
    {
        if(!$this->id) {
            throw new \ValueError("page id is not specified");
        }
        $uri = "pages/{$this->id}/properties/{$id}";
        $response = $this->client->get($uri);
        $res = new Response($response);
        return $res->getValue();
    }
}