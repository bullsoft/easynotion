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

    public function children(string $blockId, int $pageSize = 20, ?string $start = null)
    {
        $page = new Request\Pagination($start, $pageSize);
        $uri = "blocks/{$blockId}/children";
        return $this->client->get($uri, [
            'query' => $page->__toArray()
        ])->result();
    }
}