<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\RichTextObject;
use EasyNotion\Property\Type as PropertyType;
use EasyNotion\Property\Value\{
    Date,
    Formula,
    Select, MultiSelect,
    Relation,
    Rollup,
};

// paginated list object: title, rich_text, relation and people

class PropertyItem extends AbstractObject
{
    public Type $object = Type::PropertyItem;
    public string $id;
    public PropertyType $type;
    public ?string $next_url;

    // type specificed
    public ?RichTextObject $title;
    public ?RichTextObject $rich_text;
    public ?int $number;
    public ?Select $select;
    public ?MultiSelect $multi_select;
    public ?Date $date;
    public ?Formula $formula;
    public ?Relation $relation;
    public ?Rollup $rollup;
    // array of User Entity
    public ?array $people;
    // array of FileObject
    public ?array $files;

    public ?bool $checkbox;
    public ?string $url;
    public ?string $email;
    public ?string $phone_number;
    public ?string $created_time;
    public ?User $created_by;
    public ?string $last_edited_time;
    public ?User $last_edited_by;


    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->type = PropertyType::from($map['type']);
        $this->next_url = $map['next_url'];
    }
}