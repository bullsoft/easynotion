<?php
namespace EasyNotion\Common;
use EasyNotion\Common\TypeInterface;
/**
 * Collection With Type specified
 * Collection<T>
 */
class Collection implements \JsonSerializable, \Countable, \IteratorAggregate
{
    public Type $type;
    public array $results;

    public function __construct(string|TypeInterface $type, array $list)
    {
        if(is_string($type)) {
            $this->type = Type::from($type);
        } else {
            $this->type = $type;
        }
        foreach($list as $val) {
            $this->results[] = $this->type->resolve($val);
        }
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