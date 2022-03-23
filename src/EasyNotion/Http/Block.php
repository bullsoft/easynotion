<?php
namespace EasyNotion\Http;
use EasyNotion\Entity\Block as EntityBlock;

class Block
{
    public function __construct(
        public readonly Client $client,
    )
    {
        
    }

    public function get(string $id)
    {
        $uri = "blocks/{$id}";
        return $this->client->get($uri)->result();
    }

    public function children(EntityBlock $block, int $pageSize = 20, ?string $start = null)
    {
        $page = new Request\Pagination($start, $pageSize);
        $uri = "blocks/{$block->id}/children";
        return $this->client->get($uri, [
            'query' => $page->__toArray()
        ])->result();
    }
}