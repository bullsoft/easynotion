<?php
namespace EasyNotion\Common;
use EasyNotion\Common\RichTextObject\Type;
use EasyNotion\Common\RichTextObject\Annotation;
use EasyNotion\Common\RichTextObject\Type\{Text, Mention, Equation};

class RichTextObject implements UnionInterface
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

    public function setValue(array $map): static
    {
        $key = $this->type->value;
        $val = $map[$key];
        if($val === null) {
            $this->{$key} = null;
            return $this;
        }
        match($this->type) {
            Type::Text => $this->text = new Text($val),
            Type::Mention => $this->mention = new Mention($val),
            Type::Equation => $this->equation = new Equation($val),
        };
        return $this;
    }

    public function getValue()
    {
        $key = $this->type->value;
        return $this->{$key};
    }
}