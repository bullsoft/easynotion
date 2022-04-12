<?php
namespace EasyNotion\Common\RichTextObject\Type;

use EasyNotion\Common\TypeInterface;

enum TypeMention: string implements TypeInterface
{
    case User = 'user';
    case Page = 'page';
    case Database = 'database';
    case Date = 'date';
    case LinkPreview = 'link_preview';

    public function resolve(array|string $val)
    {
    }
}