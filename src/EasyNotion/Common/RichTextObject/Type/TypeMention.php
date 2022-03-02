<?php
namespace EasyNotion\Common\RichTextObject\Type;

enum TypeMention: string
{
    case User = 'user';
    case Page = 'page';
    case Database = 'database';
    case Date = 'date';
    case LinkPreview = 'link_preview';
}