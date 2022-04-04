<?php
namespace EasyNotion\Entity\Block;
use EasyNotion\Common\CollectionTrait;
class Collection implements \JsonSerializable, \Countable, \IteratorAggregate
{
    use CollectionTrait;

    public function __construct(array $results)
    {
        foreach($results as $val) {
            $this->results[] = Element::create($val);
        }
    }
}