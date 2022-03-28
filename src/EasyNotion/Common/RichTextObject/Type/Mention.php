<?php
namespace EasyNotion\Common\RichTextObject\Type;

class Mention
{
    protected TypeMention $type;
    
    //@TODO: All Reference ???
    protected $user;
    protected $page;
    protected $database;
    protected $date;
    protected $url;

    public function __construct(array $map)
    {
        $this->type = TypeMention::from($map['type']);
    }
}