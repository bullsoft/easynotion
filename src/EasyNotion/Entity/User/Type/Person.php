<?php
namespace EasyNotion\Entity\User\Type;

class Person
{
    public string $email;

    public function __construct(array $map)
    {
        $this->email = $map['email'];
    }
}