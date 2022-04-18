<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\Base;
use EasyNotion\Common\UnionInterface;
use EasyNotion\Http\{Client, Page as PageClient, Database as DbClient};

class ParentObject extends Base implements UnionInterface
{
    protected ParentType $type;
    protected ?string $page_id;
    protected ?string $database_id;
    protected ?string $workspace;

    public function __construct(array $map, public readonly ?Client $client = null)
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

    public function getValue()
    {
        $key = $this->type->value;
        return $this->{$key};
    }

    private function client(): PageClient|DbClient|null
    {
        return match($this->type) {
            ParentType::Page      => new PageClient($this->client),
            ParentType::Database  => new DbClient($this->client),
            default => null,
        };
    }

    public function get()
    {
        $instance = $this->client();
        return $instance?->get($this->getValue());
    }

    public function type(): ParentType
    {
        return $this->type;
    }
}