<?php
namespace EasyNotion\Property\Filter;
use EasyNotion\Property\Configuration;
use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Type\{
    AbstractType, Checkbox, Date, Files,
    MultiSelect, Number, People, Relation,
    Rollup, Select, Text,
};

// rich_text, phone_number, number, checkbox, select, 
// multi-select, date, people, files, relation, and formula

class Property implements \JsonSerializable
{
    private AbstractType $object;
    private Type $type;

    public string $property;

    public function __construct(Configuration $config)
    {
        $this->type = $config->getType();
        $this->property = $config->getName();
        match($this->type) {
            Type::Title, Type::RichText, Type::Email, Type::Url 
                => $this->object = new Text($this->type),
            Type::Number => $this->object = new Number($this->type),
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