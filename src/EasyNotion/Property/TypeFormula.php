<?php
namespace EasyNotion\Property;

enum TypeFormula: string
{
    case LiteralString = 'string';
    case Number = 'number';
    case LiteralBoolean = 'boolean';
    case Date = 'date';
}