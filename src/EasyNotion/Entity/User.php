<?php
namespace EasyNotion\Entity;

use EasyNotion\Entity\Type;
use EasyNotion\Common\UnionInterface;
use EasyNotion\Common\UUIDv4;
use EasyNotion\Entity\User\Type as UserType;
use EasyNotion\Entity\User\Type\{Bot, Person};

class User extends AbstractObject implements UnionInterface
{
    // Entity Type
    protected Type $object = Type::User;
    // UUIDv4
    protected readonly UUIDv4|string $id;

    public ?UserType $type;
    public ?string $name;
    public ?string $avatar_url;

    // type specificed
    public ?Person $person;
    public ?Bot $bot;

    public function __construct(array $map)
    {
        $this->id = new UUIDv4($map['id']);
        $this->type = UserType::from($map['type']);
        $this->name = $map['name'];
        if(isset($map['avatar_url'])) {
            $this->avatar_url = $map['avatar_url'];
        }
        $this->setValue($map);
    }

    public function setValue(array $map): static
    {
        $val = $map[$this->type->value];
        match($this->type) {
            UserType::Person => $this->person = new Person($val),
            UserType::Bot => $this->bot = new Bot($val)
        };
        return $this;
    }

    public function getValue()
    {
        $key = $this->type->value;
        return $this->{$key};
    }
}