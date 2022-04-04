<?php
namespace EasyNotion\Common;

trait CollectionTrait
{
    public array $results;

    public function results(): array
    {
        return $this->results;
    }
    
    public function isEmpty(): bool
    {
        return empty($this->results);
    }

    public function count(): int
    {
        return count($this->results);
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }

    public function __toArray(): array
    {
        return $this->results;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->results);
    }

    public function toArray(): array
    {
        return $this->__toArray();
    }
}