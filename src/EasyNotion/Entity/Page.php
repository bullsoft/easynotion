<?php
namespace EasyNotion\Entity;
use EasyNotion\Common\RichTextObject;
use EasyNotion\Common\FileObject;
use EasyNotion\Common\EmojiObject;
use EasyNotion\Common\UUIDv4;
use EasyNotion\Property\Value as PropertyValue;

class Page extends AbstractObject
{
    use MetaTrait;

    // Entity Type
    protected Type $object = Type::Page;
    // UUIDv4
    protected readonly UUIDv4|string $id;

    public bool $archived;
    public null|FileObject|EmojiObject $icon;
    public ?FileObject $cover;
    public array $properties;
    public ParentObject $parent;
    public $url;

    public function __construct(array $map)
    {
        $this->id = new UUIDv4($map['id']);
        $this->archived = $map['archived'];
        $this->setCreatedBy($map['created_by'])
             ->setCreatedTime($map['created_time'])
             ->setLastEditedBy($map['last_edited_by'])
             ->setLastEditedTime($map['last_edited_time'])
             ->setParent($map['parent'])
             ->setProperties($map['properties'])
             ->setUrl($map['url'])
             ;
    }

    public function setProperties(array $map): static
    {
        foreach($map as $key => $item) {
            $this->properties[$key] = new PropertyValue($item);
        }
        return $this;
    }

    public function setParent(array $map): static
    {
        $this->parent = new ParentObject($map);
        return $this;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;
        return $this;
    }

    public static function create(array $map)
    {
        $intance = new static($map);
        return $intance;
    }

    public function get()
    {
        
    }
}