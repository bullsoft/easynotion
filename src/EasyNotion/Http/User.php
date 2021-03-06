<?php
namespace EasyNotion\Http;
use EasyNotion\Entity\User as UserEntity;
class User
{
    public function __construct(
        public readonly Client $client
    )
    {
    }

    public function get(string $id)
    {
        $uri = "users/{$id}";
        return $this->client->get($uri)->result();
    }

    public function list(int $pageSize = 20, ?string $start = null)
    {
        $page = new Request\Pagination($start, $pageSize);
        return $this->client->get("users", [
            'query' => $page->__toArray()
        ])->result();
    }

    public function bot()
    {
        $uri = "users/me";
        return $this->client->get($uri)->result();
    }
}