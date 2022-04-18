<?php
namespace EasyNotion\Property;

use EasyNotion\Common\Base;
use EasyNotion\Property\Type;
use EasyNotion\Property\Configuration\{
    Number, Select, MultiSelect, Formula,
    Relation, Rollup,
};
use EasyNotion\Property\Sort\Direction;
use EasyNotion\Common\UnionInterface;

class Configuration extends Base implements UnionInterface
{
    public string $id;
    public Type $type;
    public string $name;

    // Type specific
    public ?\stdClass $title;
    public ?\stdClass $rich_text;
    public ?Number $number;
    public ?Select $select;
    public ?MultiSelect $multi_select;
    public ?\stdClass $date;
    public ?\stdClass $people;
    public ?\stdClass $files;
    public ?\stdClass $checkbox;
    public ?\stdClass $url;
    public ?\stdClass $email;
    public ?\stdClass $phone_number;
    public ?Formula $formula;
    public ?Relation $relation;
    public ?Rollup $rollup;
    public ?\stdClass $created_time;
    public ?\stdClass $created_by;
    public ?\stdClass $last_edited_time;
    public ?\stdClass $last_edited_by;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->name = $map['name'];
        $this->type = Type::from($map['type']);
        $this->setValue($map);
    }

    public function setValue(array $map): static
    {
        $key = $this->type->value;
        $val = $map[$key];
        if($val === null) {
            $this->{$key} = new \stdClass();
            return $this;
        }
        match($this->type) {
            Type::Title => $this->title = new \stdClass(),
            Type::RichText => $this->rich_text = new \stdClass(),
            Type::MultiSelect => $this->multi_select = new MultiSelect($val),
            Type::Select => $this->select = new Select($val),
            Type::Number => $this->number = new Number($val),
            Type::Formula => $this->formula = new Formula($val),
            Type::Relation => $this->relation = new Relation($val),
            Type::Rollup => $this->rollup = new Rollup($val),
            default => $this->{$this->type->value} = new \stdClass(),
        };
        return $this;
    }

    public function getValue()
    {
        $key = $this->type->value;
        return $this->{$key};
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function type(): Type
    {
        return $this->type;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function filter()
    {
        return Filter::make($this->name, $this->type);
    }

    public function sortAsc()
    {
        $sort = new Sort();
        return match($this->type) {
            Type::CreatedTime, Type::LastEditedTime => $sort->by($this->type->value, Direction::Asc),
            default => $sort->by($this->name, Direction::Asc),
        };
    }

    public function sortDesc()
    {
        $sort = new Sort();
        return match($this->type) {
            Type::CreatedTime, Type::LastEditedTime => $sort->by($this->type->value, Direction::Desc),
            default => $sort->by($this->name, Direction::Desc),
        };
    }
}