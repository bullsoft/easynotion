<?php

namespace EasyNotion\Property\Sort;

class Timestamp implements \JsonSerializable
{
    public function __construct(
        protected string $timestamp, // created_time or last_edited_time
        protected ?Direction $direction = null,
    )
    {
    }

    public function asc()
    {
        $this->direction = Direction::from('descending');
        return $this;
    }

    public function desc()
    {
        $this->direction = Direction::from('ascending');
        return $this;
    }


    public function __toArray()
    {
        return [
            'timestamp' => $this->timestamp,
            'direction' => $this->direction,
        ];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->__toArray();
    }

}