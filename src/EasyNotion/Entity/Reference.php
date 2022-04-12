<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\Base;
use EasyNotion\Common\UnionInterface;
use EasyNotion\Http\{
    Client, Page as PageClient, Block as BlockClient, 
    Database as DbClient, User as UserClient
};

class Reference extends Base implements UnionInterface
{
    public string $type;
    private Type $_type;
    public ?string $page_id;
    public ?string $block_id;
    public ?string $database_id;
    public ?string $user_id;

    public function __construct(array $map, public readonly ?Client $client = null)
    {
        $entityType = strstr($map['type'], '_id', true);
        $this->_type = Type::from($entityType);
        $this->type = $map['type'];
        $this->{$this->type} = $map[$this->type];
    }

    public function setValue(array $map): static
    {
        $key = $this->type;
        $this->{$key} = $map[$key];
        return $this;
    }

    public function getValue()
    {
        $key = $this->type;
        return $this->{$key};
    }

    private function client(): PageClient|DbClient|BlockClient|UserClient
    {
        return match($this->_type) {
            Type::Page => new PageClient($this->client),
            Type::Database => new DbClient($this->client),
            Type::Block => new BlockClient($this->client),
            Type::User => new UserClient($this->client)
        };
    }

    public function get()
    {
        $instance = $this->client();
        return $instance?->get($this->getValue());
    }
}