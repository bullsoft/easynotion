<?php
namespace EasyNotion\Entity;
use EasyNotion\Common\UUIDv4;
use EasyNotion\Http\{Client, User as UserClient};

class PartialUser extends AbstractObject
{
    // Entity Type
    protected Type $object;
    // UUIDv4
    protected readonly UUIDv4|string $id;

    public function __construct(array $map, public readonly ?Client $client = null)
    {
        $this->object = Type::from($map['object']);
        $this->id = new UUIDv4($map['id']);
    }

    public function get(): User
    {
        $userClient = new UserClient($this->client);
        return $userClient->get($this->id);
    }
}