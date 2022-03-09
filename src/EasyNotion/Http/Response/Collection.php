<?php

namespace EasyNotion\Http\Response;

use EasyNotion\Entity\Factory;
use EasyNotion\Entity\Type;
use EasyNotion\Entity\PropertyItem;

class Collection
{
    public bool $has_more;
    public ?string $next_cursor;
    public array $results;
    public string $object = 'list';
    public ?Type $type;
    public ?PropertyItem $property_item;

    public function __construct(array $list)
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
            $this->results[] = Factory::make($item);
        }
    }
}