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

    public function create(array $properties, array $parent): EntityPage
    {
        $body = array_merge([
            'parent' => $parent,
            'properties' => $properties,
        ]);
        return $this->client->post('pages', [
            'body' => json_encode($body),
        ])->result();
    }

    public function update(string $id, array $properties): EntityPage
    {
        $uri = "pages/{$id}";
        return $this->client->patch($uri, [
            'body' => json_encode(['properties' => $properties]),
        ])->result();
    }

    public function archive(string $id, bool $archived = true): EntityPage
    {
        $uri = "pages/{$id}";
        return $this->client->patch($uri, [
            'body' => json_encode(['archived' => $archived]),
        ])->result();
    }
}