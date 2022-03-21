<?php
namespace EasyNotion\Http;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Entity\Page as EntityPage;

class Page
{
    public function __construct(
        private HttpClient $client
    )
    {
        
    }

    public function get(string $id)
    {
        $uri = "pages/{$id}";
        $response = $this->client->get($uri);
        $res = new Response($response);
        return $res->getValue();
    }
}