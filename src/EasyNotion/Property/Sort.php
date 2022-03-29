<?php
namespace EasyNotion\Property;
use EasyNotion\Property\Sort\{
    Property, Timestamp, Direction
};

class Sort implements \JsonSerializable
{
    public array $sorts = [];

    public function __construct()
    {

    }

    public function by(string $property, Direction $direction)
    {
        $item = match($property) {
            "created_time", "last_edited_time" => new Timestamp($property, $direction),
            default => new Property($property, $direction),
        };
        $this->sorts[] = $item;
        return $this;
    }

    public function merge(Sort $item)
    {
        $this->sorts = array_merge($this->sorts, $item->get());
        return $this;
    }

    public function get(): array
    {
        return $this->sorts;
    }

    public function __toArray()
    {
        return ['sorts' => $this->sorts];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->__toArray();
    }
}