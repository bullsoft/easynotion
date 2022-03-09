<?php

namespace EasyNotion\Property;
use EasyNotion\Common\Collection;
use EasyNotion\Entity\User;
use EasyNotion\Property\Value\{
    Date,
    Formula,
    MultiSelect,
    Relation,
    Rollup,
    Select,
};

class Value
{
    public string $id;
    public ?Type $type;

    // array of RichTextObject
    public ?Collection $title;
    public ?Collection $rich_text;
    public ?int $number;
    public ?Select $select;
    // array of Select
    public ?MultiSelect $multi_select;
    public ?Date $date;
    public ?Formula $formula;
    public ?Relation $relation;
    public ?Rollup $rollup;
    // array of User Entity
    public ?array $people;
    public ?array $files;
    public ?bool $checkbox;
    public ?string $url;
    public ?string $email;
    public ?string $phone_number;

    public ?string $created_time;
    public ?User $created_by;
    public ?string $last_edited_time;
    public ?User $last_edited_by;

}