<?php
namespace EasyNotion\Entity;

class ParentObject
{
    protected ParentType $type;
    protected ?string $page_id;
    protected ?string $database_id;
    protected ?string $workspace;

    public function __construct(array $map)
    {
        $this->type = ParentType::from($map['type']);
        $this->setValue($map);
    }

    public function setValue(array $map): static
    {
        $val = $map[$this->type->value];
        match($this->type) {
            ParentType::Page      => $this->page_id = $val,
            ParentType::Database  => $this->database_id = $val,
            ParentType::Workspace => $this->workspace = $val,
        };
        return $this;
    }
}