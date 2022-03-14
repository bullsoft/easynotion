<?php
namespace EasyNotion\Http;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Entity\Page as PageEntity;
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
        $response = $this->client->get("pages/{$this->id}");
        $body = $response->getBody();
        $map = json_decode($body->getContents(), true);
        return new PageEntity($map);
    }
}