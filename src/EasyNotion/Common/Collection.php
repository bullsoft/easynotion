<?php
namespace EasyNotion\Common;
use EasyNotion\Common\TypeInterface;
/**
 * Collection With Type specified
 * Collection<T>
 */
class Collection implements \JsonSerializable, \Countable, \IteratorAggregate
{
    use CollectionTrait;

    public Type $type;

    /**
     * @param Array<string|TypeInterface> $list
     */
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
}