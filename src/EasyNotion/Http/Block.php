<?php
namespace EasyNotion\Http;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Entity\Block as EntityBlock;
class Block
{
    public function __construct(
        public readonly HttpClient $client,
    )
    {
        
    }

    public function get(string $id)
    {
        $uri = "blocks/{$id}";
        $response = $this->client->get($uri);
        $res = new Response($response);
        return $res->getValue();   
    }

    public function children(EntityBlock $block, int $step = 20, ?int $start = null)
    {
        $page = new Request\Pagination($start, $step);
        $uri = "blocks/{$block->id}/children";
        $response = $this->client->get($uri, [
            'query' => $page->__toArray()
        ]);
        $res = new Response($response);
        return $res->getValue();
    }
}