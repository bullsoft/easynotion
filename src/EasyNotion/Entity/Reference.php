<?php
namespace EasyNotion\Entity;

class Reference
{
    public string $type;
    private Type $_type;
    public ?string $page_id;
    public ?string $block_id;
    public ?string $database_id;
    public ?string $user_id;

    public function __construct(array $map)
    {
        $entityType = strstr($map['type'], '_id', true);
        $this->_type = Type::from($entityType);
        $this->type = $map['type'];
        $this->{$this->type} = $map[$this->type];
    }

    public function resolve()
    {
        $val = $this->_type->value;
        return match($this->_type) {
            Type::Page => '',
            Type::Database => '',
            Type::Block => '',
            Type::User => ''
        };
    }
}