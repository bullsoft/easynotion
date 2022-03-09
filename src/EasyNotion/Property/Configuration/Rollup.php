<?php
namespace EasyNotion\Property\Configuration;

use EasyNotion\Property\Type\TypeFunction;

class Rollup
{
    public string $relation_property_name;
    public string $relation_property_id;
    public string $rollup_property_name;
    public string $rollup_property_id;
    public TypeFunction $function;
}