<?php
namespace EasyNotion\Entity;
use EasyNotion\Entity\Block\Type as BlockType;
use EasyNotion\Entity\Type;
use EasyNotion\Entity\Reference;
use EasyNotion\Entity\Block\{Heading};
class Block extends AbstractObject
{
    public Type $object = Type::Block;
    // UUIDv4
    public string $id;
    public BlockType $type;
    public string $create_time;
    public Reference $createdBy;
    public string $last_edited_time;
    public Reference $last_edited_by;
    public bool $archived;
    public bool $has_children;


    // type specified

    public $paragraph;
    public Heading $header_1;
    public Heading $header_2;
    public Heading $header_3;

}