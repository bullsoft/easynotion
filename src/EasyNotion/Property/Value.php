<?php
namespace EasyNotion\Property;

use EasyNotion\Common\Base;
use EasyNotion\Common\UnionInterface;
use EasyNotion\Common\Collection as CommCollection;
use EasyNotion\Common\Type as CommType;
use EasyNotion\Entity\User;
use EasyNotion\Entity\Type as EntityType;
use EasyNotion\Property\Value\Select;
use EasyNotion\Property\Value\MultiSelect;
use EasyNotion\Property\Value\Date;
use EasyNotion\Property\Value\Formula;
use EasyNotion\Property\Value\Relation;
use EasyNotion\Property\Value\Rollup;

class Value extends Base implements UnionInterface
{
    use BaseValue;

    public string $id;
    public ?Type $type;

    public function __construct(array $map)
    {
        $this->id = $map['id'];
        $this->type = Type::from($map['type']);
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
            Type::Title => $this->title = new CommCollection(CommType::RichTextObject, $val),
            Type::RichText => $this->rich_text = new CommCollection(CommType::RichTextObject, $val),
            Type::Number => $this->number = $val,
            Type::Select => $this->select = new Select($val),
            Type::MultiSelect => $this->multi_select = new MultiSelect($val),
            Type::Date => $this->date = new Date($val),
            Type::People => $this->people = new CommCollection(EntityType::User, $val),
            Type::Files => $this->files = new CommCollection(CommType::FileObject, $val),
            Type::Checkbox, Type::Url, Type::Email, Type::PhoneNumber => $this->{$key} = $val,
            Type::CreatedBy, Type::LastEditedBy => $this->{$key} = new User($val),
            Type::CreatedTime, Type::LastEditedTime => $this->{$key} = new \DateTime($val),
            Type::Formula => $this->formula = new Formula($val),
            Type::Relation => $this->relation = new Relation($val),
            Type::Rollup => $this->rollup = new Rollup($val),
        };
        return $this;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function type(): Type
    {
        return $this->type;
    }
}