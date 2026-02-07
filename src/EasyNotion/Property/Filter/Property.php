<?php
namespace EasyNotion\Property\Filter;
use EasyNotion\Property\Configuration;
use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Type\{
    AbstractType, Checkbox, Date, Files,
    MultiSelect, Number, People, Relation,
    Rollup, Select, Text,
};

class Property implements \JsonSerializable
{
    private AbstractType $object;

    public function __construct(public readonly string $property, private Type $type)
    {
        match($this->type) {
            Type::Title, Type::RichText, Type::Email, Type::Url, Type::PhoneNumber
                => $this->object = new Text($this->type),
            Type::Number => $this->object = new Number($this->type),
            Type::Date, Type::CreatedTime, Type::LastEditedTime => $this->object = new Date($this->type),
            Type::Checkbox => $this->object = new Checkbox($this->type),
            Type::Select, Type::MultiSelect => $this->object = new Select($this->type),
            Type::People => $this->object = new People($this->type),
            Type::Files => $this->object = new Files($this->type),
            Type::Relation => $this->object = new Relation($this->type),
            Type::Rollup => $this->object = new Rollup($this->type),
            Type::Formula => $this->object = new Text($this->type),
        };
    }

    public function __call(string $method, array $args)
    {
        call_user_func_array([$this->object, $method], $args);
        return $this;
    }

    public function __toArray()
    {
        return [
            "property" => $this->property
        ] + $this->object->getValue();
    }


    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->__toArray();
    }

}