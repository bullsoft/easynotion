<?php
namespace EasyNotion\Common\RichTextObject;

use EasyNotion\Common\TypeInterface;

enum Type: string implements TypeInterface
{
    case Text = 'text';
    case Mention = 'mention';
    case Equation = 'equation';

    public function resolve(array|string $val)
    {
        return match($this) {
            self::Text => new Type\Text($val),
            self::Mention => new Type\Mention($val),
            self::Equation => new Type\Equation($val),
        };
    }
}