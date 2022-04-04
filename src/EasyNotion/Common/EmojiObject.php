<?php
namespace EasyNotion\Common;
use EasyNotion\Common\EmojiObject\Type;

class EmojiObject implements UnionInterface
{
    public Type $type;
    public string $emoji;

    public function __construct(array $map)
    {
        $this->type = Type::from($map['type']);
        $this->setValue($map);
    }

    public function setValue(array $map): static
    {
        $this->emoji = $map['emoji'];
        return $this;
    }

    public function getValue()
    {
        return $this->emoji;
    }
}