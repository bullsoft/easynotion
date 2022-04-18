<?php
namespace EasyNotion\Entity;

use EasyNotion\Entity\{Type, PropertyItem};
use EasyNotion\Common\{CollectionTrait, UnionInterface};
use EasyNotion\Http\{Client, Factory, Request\Pagination};

class EntityList extends AbstractObject implements \JsonSerializable, \Countable, \IteratorAggregate, UnionInterface
{
    use CollectionTrait;

    protected Type $object = Type::List;
    public ?Type $type;

    public bool $has_more;
    public ?string $next_cursor;
    public ?PropertyItem $property_item;

    public function __construct(array $list, public readonly Client $client)
    {
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
        $this->setValue($list);
    }

    public function setValue(array $map): static
    {
        foreach($map['results'] as $item) {
            $this->results[] = Factory::make($item, $this->client);
        }
        return $this;
    }

    public function getValue()
    {
        return $this->results();
    }

    public function hasMore(): bool
    {
        return $this->has_more === true;
    }

    public function nextCursor(): ?string
    {
        return $this->next_cursor;
    }

    public function type(): Type
    {
        return $this->type;
    }

    public function next(): ?EntityList
    {
        if($this->hasMore() === false) {
            return null;
        }
        $opts = $this->client->requestOpts();
        $page = null;
        if(isset($opts[1]['query'])) {
            $page = Pagination::from($opts[1]['query']);
            $page->start_cursor = $this->nextCursor();
            $opts[1]['query'] = $page->__toArray();
        }
        if(isset($opts[1]['body']) && $page === null) {
            $body = json_decode($opts[1]['body'], true);
            $page = Pagination::from($body);
            $page->start_cursor = $this->nextCursor();
            $body = array_merge($body, $page->__toArray());
            $opts[1]['body'] = json_encode($body);
        }
        $client = call_user_func_array([$this->client, $this->client->httpMethod()], $opts);
        return $client->result();
    }
}