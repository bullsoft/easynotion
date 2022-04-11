<?php
namespace EasyNotion\Http;
use EasyNotion\Entity\Page as EntityPage;

class Page
{
    public function __construct(
        public readonly Client $client
    )
    {
    }

    public function get(string $id): EntityPage
    {
        $uri = "pages/{$id}";
        return $this->client->get($uri)->result();
    }
}