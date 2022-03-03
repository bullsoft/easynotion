<?php
namespace EasyNotion\Entity;

use EasyNotion\Entity\Type;
use EasyNotion\Entity\User\Type as UserType;
use EasyNotion\Entity\User\Type\{Bot, Person};
class User extends AbstractObject
{
    public Type $object = Type::User;
    public string $id;
    public ?UserType $type;
    public ?string $name;
    public ?string $avatar_url;
    // type specificed
    public ?Person $person;
    public ?Bot $bot;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->type = UserType::from($map['type']);
        $this->name = $map['name'];
        $this->avatar_url = $map['avatar_url'];
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
}