<?php
namespace EasyNotion\Common\RichTextObject;

class Annotation
{
    protected bool $bold;
    protected bool $italic;
    protected bool $strikethrough;
    protected bool $underline;
    protected bool $code;
    // @TODO: enum here
    protected string $color; 

    public function __construct(array $val)
    {
        foreach($val as $key => $item) {
            $this->{$key} = $item;
        }
    }
}