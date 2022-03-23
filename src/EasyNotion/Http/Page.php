<?php
namespace EasyNotion\Http;
use EasyNotion\Entity\Page as EntityPage;

class Page
{
    public function __construct(
        private Client $client
    )
    {
        
    }

    public function get(string $id)
    {
        $uri = "pages/{$id}";
        return $this->client->get($uri)->result();
    }
}