<?php
namespace EasyNotion\Entity;
use EasyNotion\Common\RichTextObject;
use EasyNotion\Common\FileObject;
use EasyNotion\Common\EmojiObject;
use EasyNotion\Common\{UUIDv4, Collection};
use EasyNotion\Entity\{Type, Reference};
use EasyNotion\Property\Configuration;
use EasyNotion\Http\{Client, Database as DbClient};
use EasyNotion\Property\Filter;
use EasyNotion\Property\Sort;

class Database extends AbstractObject
{
    use MetaTrait;

    // Entity Type
    protected Type $object = Type::Database;
    // UUIDv4
    protected readonly UUIDv4|string $id;

    // Collection<RichTextObject>
    public Collection $title;
    public null|FileObject|EmojiObject $icon;
    public ?FileObject $cover;
    public array $properties;
    public ParentObject $parent;
    public string $url;

    public function __construct(array $map, public readonly ?Client $client = null)
    {
        $this->id = new UUIDv4($map['id']);
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

    public function setTitle(array $list): static
    {
        $this->title = new Collection('rich_text', $list);
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

    public function get(?Filter $filter = null, ?Sort $sort = null, int $pageSize = 20, ?string $start = null)
    {
        $dbClient = new DbClient($this->client);
        return $dbClient->query($this->id, $filter, $sort, $pageSize, $start);
    }
}