<?php
namespace EasyNotion\Common\RichTextObject;
use EasyNotion\Common\Collection;
class Link
{
    protected string $type = "url";
    protected string $url;
    protected ?Collection $caption;

    public function __construct(string $url, ?array $caption = null)
    {
        $this->url = $url;
        if(is_array($caption) && !empty($caption)) {
            $this->caption = new Collection('rich_text', $caption);
        }
    }
}