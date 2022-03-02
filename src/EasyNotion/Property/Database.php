<?php
namespace EasyNotion\Property;
use EasyNotion\Property\Database\Type;

class Database
{
    public string $id;
    public Type $type;
    public string $name;
    // Type specific
    public $title;
    public $rich_text;
    public $number;
    public $select;
    public $multi_select;
    public $date;
    public $people;
    public $files;
    public $checkbox;
    public $url;
    public $email;
    public $phone_number;
    public $formula;
    public $relation;
    public $rollup;
    public $created_time;
    public $created_by;
    public $last_edited_time;
    public $last_edited_by;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->name = $map['name'];
        $this->type = Type::from($map['type']);
        $this->setValue($map);
    }

    public function setValue(array $map): static
    {
        $val = $map[$this->type->value];
        switch($this->type) {
            case Type::Title: {
                $this->title = $val;
                break;
            };
            case Type::MultiSelect: {
                $this->multi_select = $val;
                break;
            } 
        }
        return $this;
    }
}