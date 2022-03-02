<?php
namespace EasyNotion\Common\RichTextObject\Type;
use EasyNotion\Common\RichTextObject\Link;

class Text
{
    protected string $content;
    protected ?Link $link;

    public function __construct(array $val)
    {
        $this->content = $val['content'];
        if($val['link'] === null) {
            $this->link = null;
        } else {
            $this->link = new Link($val['link']);
        }
        
    }
}