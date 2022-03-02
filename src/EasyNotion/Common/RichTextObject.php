<?php
namespace EasyNotion\Common;
use EasyNotion\Common\RichTextObject\Type;
use EasyNotion\Common\RichTextObject\Annotation;
use EasyNotion\Common\RichTextObject\Type\{Text, Mention, Equation};


class RichTextObject
{
    protected string $plain_text;
    protected ?string $href;
    protected Annotation $annotations;
    protected Type $type;
    protected ?Text $text;
    protected ?Mention $mention;
    protected ?Equation $equation;

    public function __construct(array $map)
    {
        $this->type = Type::from($map['type']);
        $this->annotations = new Annotation($map['annotations']);
        $this->plain_text = $map['plain_text'];
        $this->href = $map['href'];
        $this->setValue($map);
    }

    public function setValue(array $map)
    {
        $val = $map[$this->type->value];
        return match($this->type) {
            Type::Text => new Text($val)
        };
    }

    public function getValue()
    {

    }
}