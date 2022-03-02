<?php
namespace EasyNotion\Common\RichTextObject;

class Link
{
    protected string $type = "url";
    protected string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }
}