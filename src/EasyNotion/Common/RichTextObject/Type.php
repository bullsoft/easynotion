<?php
namespace EasyNotion\Common\RichTextObject;

enum Type: string
{
    case Text = 'text';
    case Mention = 'mention';
    case Equation = 'equation';
}