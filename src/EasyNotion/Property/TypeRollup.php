<?php

namespace EasyNotion\Property;

enum TypeRollup: string
{
    case Number = 'number';
    case Date = 'date';
    case LiteralArray = 'array';
    case Unsupported = 'unsupported';
    case Incomplete = 'incomplete';
}