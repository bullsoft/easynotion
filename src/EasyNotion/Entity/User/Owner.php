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
        $item = $map['owner'];
        $this->type = TypeOwner::from($item['type']);
        $this->setValue($item);
    }

    public function setValue(array $map): static
    {
        match($this->type) {
            TypeOwner::User => $this->user = new User($map['user']),
            TypeOwner::Workspace => $this->workspace = true,
        };
        return $this;
    }
}