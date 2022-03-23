<?php
namespace EasyNotion\Http;
use EasyNotion\Entity\PropertyItem;
use EasyNotion\Entity\Page;

class Property
{
    public function __construct(
        private Client $client,
        private Page $page,
    )
    {
    
    }

    public function get(string $id)
    {
        $uri = "pages/{$this->page->id}/properties/{$id}";
        return $this->client->get($uri)->result();
    }
}