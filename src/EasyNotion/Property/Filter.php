<?php
namespace EasyNotion\Property;
use EasyNotion\Property\Filter\{
    Property, Timestamp, Compound
};

use EasyNotion\Property\Type;

class Filter implements \JsonSerializable
{
    public Property|Timestamp|Compound|null $filter = null;

    public function __construct(Property|Timestamp|Compound $item)
    {
        $this->filter = $item;
    }

    public static function make(string $property, ?Type $type = null)
    {
        $item = match($property) {
            "created_time", "last_edited_time" => new Timestamp(Type::from($property)),
            default => new Property($property, $type),
        };
        return new self($item);
    }

    public function __call(string $method, array $args)
    {
        call_user_func_array(
            [$this->filter, $method],
            $args
        );
        return $this;
    }

    public function or(Filter $item)
    {
        switch(get_class($this->filter)) {
            case Property::class:
            case Timestamp::class:
                $compound = new Compound($this->filter, "or");
                $compound->or($item->get());
                $this->filter = $compound;
                break;
            case Compound::class:
                $this->filter->or($item->get());
                break;
        }
        return $this;
    }

    public function and(Filter $item)
    {
        switch(gettype($this->filter)) {
            case Property::class:
            case Timestamp::class:
                $compound = new Compound($this->filter, "and");
                $compound->and($item->get());
                $this->filter = $compound;
                break;
            case Compound::class:
                $this->filter->and($item->get());
                break;
        }
        return $this;
    }

    public function get()
    {
        return $this->filter;
    }

    public function __toArray()
    {
        return ['filter' => $this->filter];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->__toArray();
    }
}