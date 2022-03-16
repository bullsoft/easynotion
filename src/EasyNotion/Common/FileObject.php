<?php
namespace EasyNotion\Common;
use EasyNotion\Common\FileObject\Type as FileType;
use EasyNotion\Common\FileObject\Type\External;
use EasyNotion\Common\FileObject\Type\File;

class FileObject
{
    public FileType $type;
    public ?string $name;
    public ?Collection $caption;
    public ?External $external;
    public ?File $file;

    public function __construct(array $map)
    {
        $this->type = FileType::from($map['type']);
        $this->name = $map['name'] ?? null;
        $this->caption = empty($map['caption']) ? null : new Collection(Type::RichTextObject, $map['caption']);
        $this->setValue($map);
    }

    public function setValue(array $map): static
    {
        $val = $map[$this->type->value];
        match($this->type) {
            FileType::External => $this->external = new External($val),
            FileType::File => $this->file = new File($val),
        };
        return $this;
    }
}