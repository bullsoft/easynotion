<?php
namespace EasyNotion\Http;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Entity\PropertyItem;
use EasyNotion\Entity\Page;

class Property
{
    public function __construct(
        private HttpClient $client,
        private Page $page,
    )
    {
    
    }

    public function get(string $id)
    {
        $uri = "pages/{$this->page->id}/properties/{$id}";
        $response = $this->client->get($uri);
        $res = new Response($response);
        return $res->getValue();
    }
}