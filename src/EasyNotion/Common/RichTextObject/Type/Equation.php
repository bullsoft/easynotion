<?php
namespace EasyNotion\Common\RichTextObject\Type;

class Equation
{
    public string $expression;

    public function __construct(string $expression)
    {
        $this->expression = $expression;
    }
}