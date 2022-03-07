<?php
namespace EasyNotion\Common;
use EasyNotion\Common\Type;

class Collection
{
    public Type $type;
    public array $list;

    public function __construct(string $type, array $list)
    {
        $this->type = Type::from($type);
        foreach($list as $val) {
            $this->list[] = $this->type->resolve($val);
        }
    }
}