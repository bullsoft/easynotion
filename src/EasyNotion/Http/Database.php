<?php
namespace EasyNotion\Http;
use EasyNotion\Entity\Database as DbEntity;

class Database
{
    public function __construct(
        private Client $client,
    )
    {
    }

    public function get(string $id)
    {
        $uri = "databases/{$id}";
        return $this->client->get($uri)->result();
    }

    public function query(string $id)
    {
        $uri = "databases/{$id}/query";
        return $this->client->post($uri)->result();
    }
}