<?php
namespace EasyNotion\Common\RichTextObject\Type;
use EasyNotion\Common\UnionInterface;

class Mention implements UnionInterface
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

    public function setValue(array $map): static
    {
        return $this;
    }

    public function getValue()
    {
        return ;
    }

    public function type(): TypeMention
    {
        return $this->type;
    }
}