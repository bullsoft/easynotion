<?php
namespace EasyNotion\Common;

enum Type: string implements TypeInterface
{
    case RichTextObject = 'rich_text';
    case FileObject = 'file';
    case EmojiObject = 'emoji';

    public function resolve(array $map)
    {
        return match($this) {
            self::RichTextObject => new RichTextObject($map),
            self::FileObject => new FileObject($map),
            self::EmojiObject => new EmojiObject($map)
        };
    }

    public function get()
    {

    }
}