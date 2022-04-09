<?php
namespace EasyNotion\Property\Sort;

class Property implements \JsonSerializable
{
    public function __construct(
        protected string $property, 
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
            'property' => $this->property,
            'direction' => $this->direction,
        ];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->__toArray();
    }

}