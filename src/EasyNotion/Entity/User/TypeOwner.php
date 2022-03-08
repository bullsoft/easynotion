<?php
namespace EasyNotion\Entity\User;

enum TypeOwner: string
{
    case User = 'user';
    case Workspace = 'workspace';
}