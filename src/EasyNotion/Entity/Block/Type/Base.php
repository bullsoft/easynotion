<?php
namespace EasyNotion\Entity\Block\Type;
use EasyNotion\Common\Collection as CommCollection;
use EasyNotion\Entity\Block\Collection;

abstract class Base
{
    public ?CommCollection $rich_text;
    public ?Collection $children;

    public function __construct(array $map)
    {
        if(isset($map['rich_text'])) {
            $this->rich_text = new CommCollection('rich_text', $map['rich_text']);
        }
        if(isset($map['children'])) {
            $this->children = new Collection($map['children']);
        }
    }
}