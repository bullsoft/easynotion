<?php
namespace EasyNotion\Property\Filter;

class Compound implements \JsonSerializable
{
    public ?array $or;
    public ?array $and;

    private Compound|Property|Timestamp $first;

    public function __construct(Compound|Property|Timestamp $first, ?string $operator = null)
    {
        $this->first = $first;
        match($operator) {
            'or' => $this->or = [],
            'and' => $this->and = [],
            default => null,
        };
    }

    public function or($item)
    {
        if(!isset($this->and)) {
            if(!isset($this->or)) {
                $this->or = [];
            }
            if(empty($this->or)) {
                $this->or[] = $this->first;
            }
            $this->or[] = $item;
        }
        return $this;
    }

    public function and($item)
    {
        if(!isset($this->or)) {
            if(!isset($this->and)) {
                $this->and = [];
            }
            if(empty($this->and)) {
                $this->and[] = $this->first;
            }
            $this->and[] = $item;
        }
        return $this;
    }

    public function __toArray()
    {
        if(isset($this->and) && count($this->and) > 1) {
            return ["and" => $this->and];
        }
        if(isset($this->or) && count($this->or) > 1) {
            return ["or" => $this->or];
        }
        return [];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->__toArray();
    }
}