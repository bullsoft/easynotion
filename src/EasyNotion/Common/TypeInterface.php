<?php
namespace EasyNotion\Common;

interface TypeInterface
{
    public function resolve(array|string $val);
}