<?php
namespace EasyNotion\Http;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Entity\User as UserEntity;
class User
{
    public function __construct(
        private HttpClient $client
    )
    {
        
    }

    public function get(string $id)
    {
        $response = $this->client->get("users/{$id}");
        $body = $response->getBody();
        $map = json_decode($body->getContents(), true);
        return new UserEntity($map);
    }

    public function list(int $step = 20, ?int $start = null)
    {
        $page = new Request\Pagination($start, $step);
        $response = $this->client->get("users", [
            'query' => $page->__toArray()
        ]);
        $res = new Response($response);
        return $res->getValue();
    }
}