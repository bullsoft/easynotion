<?php
namespace EasyNotion\Http;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Entity\User as UserEntity;
class User
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
            throw new \ValueError("user id is not specified");
        }
        $response = $this->client->get("users/{$this->id}");
        $body = $response->getBody();
        $map = json_decode($body->getContents(), true);
        return new UserEntity($map);
    }

    public function list()
    {
        $page = new Request\Pagination(null, page_size: 16);
        $response = $this->client->get("users", [
            'query' => $page->__toArray()
        ]);
        $res = new Response($response);
        return $res->getValue();
    }
}