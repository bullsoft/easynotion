<?php

namespace EasyNotion\Entity\User;
use EasyNotion\Entity\User;

class Owner 
{
    public TypeOwner $type;
    public ?bool $workspace;
    public ?User $user;

    public function __construct(array $map)
    {
        $this->type = TypeOwner::from($map['type']);
        $this->setValue($map);
    }

    public function setValue(array $map): static
    {
        match($this->type) {
            TypeOwner::User => $this->user = new User($map['user']),
            TypeOwner::Workspace => $this->workspace = true,
        };
        return $this;
    }

    public function getValue()
    {
        $key = $this->type->value;
        return $this->{$key};
    }
}