<?php
namespace EasyNotion\Property;

use EasyNotion\Entity\{
    User, Type as EntityType,
};
use EasyNotion\Common\{
    Collection,
    Type as CommType,
};
use EasyNotion\Property\Value\{
    Date,
    Formula,
    Select, MultiSelect,
    Relation,
    Rollup,
};

trait BaseValue
{
    public ?Collection $title;
    public ?Collection $rich_text;
    public ?int $number;
    public ?Select $select;
    public ?MultiSelect $multi_select;
    public ?Date $date;
    public ?Formula $formula;
    public ?Relation $relation;
    public ?Rollup $rollup;
    // @Collection<User>
    public ?Collection $people;
    // @Collectioin<FileObject>
    public ?Collection $files;

    public ?bool $checkbox;
    public ?string $url;
    public ?string $email;
    public ?string $phone_number;

    public ?\DateTime $created_time;
    public ?User $created_by;
    public ?\DateTime $last_edited_time;
    public ?User $last_edited_by;

    public function setValue(array $map): static
    {
        $key = $this->type->value;
        $val = $map[$key];
        
        if($val === null) {
            $this->{$key} = null;
            return $this;
        }
        match($this->type) {
            Type::Title => $this->title = new Collection(CommType::RichTextObject, $val),
            Type::RichText => $this->rich_text = new Collection(CommType::RichTextObject, $val),
            Type::Number => $this->number = $val,
            Type::Select => $this->select = new Select($val),
            Type::MultiSelect => $this->multi_select = new MultiSelect($val),
            Type::Date => $this->date = new Date($val),
            Type::People => $this->people = new Collection(EntityType::User, $val),
            Type::Files => $this->files = new Collection(CommType::FileObject, $val),
            Type::Checkbox, Type::Url, Type::Email, Type::PhoneNumber => $this->{$key} = $val,
            Type::CreatedBy, Type::LastEditedBy => $this->{$key} = new User($val),
            Type::CreatedTime, Type::LastEditedTime => $this->{$key} = new \DateTime($val)
        };
        return $this;
    }

    public function getValue()
    {
        $key = $this->type->value;
        return $this->{$key};
    }
}