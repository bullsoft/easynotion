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

    public function get(string $id): EntityBlock
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

    public function append(string $blockId, array $children): EntityBlock
    {
        $uri = "blocks/{$blockId}/children";
        return $this->client->patch($uri, [
            'body' => json_encode(['children' => $children]),
        ])->result();
    }

    public function update(string $id, array $block): EntityBlock
    {
        $uri = "blocks/{$id}";
        return $this->client->patch($uri, [
            'body' => json_encode($block),
        ])->result();
    }

    public function delete(string $id): EntityBlock
    {
        $uri = "blocks/{$id}";
        return $this->client->delete($uri)->result();
    }
}