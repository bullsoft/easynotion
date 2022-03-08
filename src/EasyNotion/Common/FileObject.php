<?php
namespace EasyNotion\Common;
use EasyNotion\Common\FileObject\Type;
use EasyNotion\Common\FileObject\Type\External;
use EasyNotion\Common\FileObject\Type\File;

class FileObject
{
    public Type $type;
    public ?External $external;
    public ?File $file;

    public function __construct(array $map)
    {
        $this->type = Type::from($map['type']);
        $this->setValue($map);
    }

    public function setValue(array $map): static
    {
        $val = $map[$this->type->value];
        match($this->type) {
            Type::External => $this->external = new External($val),
            Type::File => $this->file = new File($val),
        };
        return $this;
    }
}