<?php
namespace EasyNotion\Entity\Block\Type;
use EasyNotion\Common\Collection;

class ChildPage
{
    public string $title;

    public function __construct(array $map)
    {
        $this->title = $map['title'];
    }
}