<?php

namespace EasyNotion\Entity\User;

enum Type: string
{
    case Person = 'person';
    case Bot = 'bot';
}