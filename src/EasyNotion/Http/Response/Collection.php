<?php

namespace EasyNotion\Http\Response;

use EasyNotion\Http\Factory;
use EasyNotion\Entity\Type;
use EasyNotion\Entity\PropertyItem;
use EasyNotion\Http\Client;
use EasyNotion\Http\Request\Pagination;

class Collection
{
    public bool $has_more;
    public ?string $next_cursor;
    public array $results;
    public string $object = 'list';
    public ?Type $type;
    public ?PropertyItem $property_item;

    public function __construct(array $list, public readonly Client $client)
    {
        if($list['object'] =! 'list') {
            throw new \ValueError("Collection accept only list");
        }
        $this->has_more = $list['has_more'];
        if($this->has_more === true) {
            $this->next_cursor = $list['next_cursor'];
        }
        if(isset($list['type'])) {
            $this->type = Type::from($list['type']);
        }
        if(isset($list['property_item'])) {
            $this->property_item = new PropertyItem($list['property_item']);
        }
        foreach($list['results'] as $item) {
            $this->results[] = Factory::make($item, $this->client);
        }
    }

    public function hasMore(): bool
    {
        return $this->has_more === true;
    }

    public function nextCursor(): ?string
    {
        return $this->next_cursor;
    }

    public function next()
    {
        if($this->hasMore()) {
            $opts = $this->client->requestOpts();
            if(isset($opts[1]['query'])) {
                $page = Pagination::from($opts[1]['query']);
            }
            $page->start_cursor = $this->nextCursor();
            $opts[1]['query'] = $page->__toArray();
            $response = call_user_func_array([$this->client, $this->client->httpMethod()], $opts);
            return $response->result();
        }
        return null;
    }
}