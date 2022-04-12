<?php
namespace EasyNotion\Common\EmojiObject;

use EasyNotion\Common\TypeInterface;
use EasyNotion\Common\EmojiObject;

enum Type: string implements TypeInterface
{
    case Emoji = 'emoji';

    public function resolve(array|string $val)
    {
        return new EmojiObject($val);
    }
}