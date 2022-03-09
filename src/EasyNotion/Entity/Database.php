<?php
namespace EasyNotion\Entity;
use EasyNotion\Common\RichTextObject;
use EasyNotion\Common\FileObject;
use EasyNotion\Common\EmojiObject;
use EasyNotion\Entity\{Type, Reference};
use EasyNotion\Property\Configuration;

class Database extends AbstractObject
{
    public Type $object = Type::Database;
    public string $id;
    
    public PartialUser $created_by;
    // ISO8601 date and time
    public string $created_time;

    public PartialUser $last_edited_by;
    // ISO8601 date and time
    public string $last_edited_time;

    //#RichTextObject()
    public array $title;
    public null|FileObject|EmojiObject $icon;
    public ?FileObject $cover;
    public array $properties;
    public ParentObject $parent;
    public $url;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->setCreatedBy($map['created_by'])
             ->setCreatedTime($map['created_time'])
             ->setLastEditedBy($map['last_edited_by'])
             ->setLastEditedTime($map['last_edited_time'])
             ->setTitle($map['title'])
             ->setParent($map['parent'])
             ->setProperties($map['properties'])
             ->setUrl($map['url'])
             ;
    }

    public function setCreatedBy(array $val): static
    {
        $this->created_by = new PartialUser(
            Type::from($val['object']),
            $val['id']
        );
        return $this;
    }

    public function setCreatedTime(string $val): static
    {
        $this->created_time = $val;
        return $this;
    }

    public function setLastEditedBy(array $val): static 
    {
        $this->last_edited_by = new PartialUser(
            Type::from($val['object']),
            $val['id']
        );
        return $this;
        return $this;
    }

    public function setLastEditedTime(string $val): static
    {
        $this->last_edited_time = $val;
        return $this;
    }

    public function setTitle(array $list): static
    {
        foreach($list as $item) {
            $this->title[] = new RichTextObject($item);
        }
        return $this;
    }

    public function setProperties(array $map): static
    {
        foreach($map as $key => $item) {
            $this->properties[$key] = new Configuration($item);
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
}