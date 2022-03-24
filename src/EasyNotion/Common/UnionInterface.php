<?php
namespace EasyNotion\Common;

interface UnionInterface
{
    public function setValue(array $map): static;
    public function getValue();
}