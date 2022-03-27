<?php
namespace EasyNotion\Common;
use EasyNotion\Common\EmojiObject\Type;

class EmojiObject
{
    public Type $type;
    public string $emoji;

    public function __construct(array $map)
    {
        $this->type = Type::from($map['type']);
        $this->emoji = $map['emoji'];
    }
}