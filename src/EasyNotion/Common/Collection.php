<?php
namespace EasyNotion\Common;
use EasyNotion\Common\TypeInterface;
class Collection
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
}