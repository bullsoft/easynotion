<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\FileObject;
use EasyNotion\Entity\Block\Type as BlockType;
use EasyNotion\Entity\Type;
use EasyNotion\Entity\PartialUser;
use EasyNotion\Entity\Block\Type\{
    ChildDatabase,
    ChildPage,
    Paragraph, Heading,
};
class Block extends AbstractObject
{
    public Type $object = Type::Block;
    // UUIDv4
    public string $id;
    public BlockType $type;
    public string $created_time;
    public PartialUser $created_by;
    public string $last_edited_time;
    public PartialUser $last_edited_by;
    public bool $archived;
    public bool $has_children;


    // type specified

    public ?Paragraph $paragraph;
    public ?Heading $header_1;
    public ?Heading $header_2;
    public ?Heading $header_3;
    public ?FileObject $image;

    public ?ChildPage $child_page;
    public ?ChildDatabase $child_database;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->type = BlockType::from($map['type']);
        $this->created_time = $map['created_time'];
        $this->created_by = new PartialUser($map['created_by']);
        $this->last_edited_time = $map['last_edited_time'];
        $this->last_edited_by = new PartialUser($map['last_edited_by']);
        $this->archived = $map['archived'];
        $this->has_children = $map['has_children'];
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
            BlockType::Paragraph => $this->paragraph = new Paragraph($val),
            BlockType::Image => $this->image = new FileObject($val),
            BlockType::ChildPage => $this->child_page = new ChildPage($val),
            BlockType::ChildDatabase => $this->child_database = new ChildDatabase($val),
            BlockType::Header1, BlockType::Header2, BlockType::Header3 => $this->{$key} = new Heading($val), 
        };
        return $this;
    }

    public function getValue()
    {
        $key = $this->type->value;
        return $this->{$key};
    }
}