<?php
namespace EasyNotion\Property\Value;
use EasyNotion\Property\TypeRollup;
use EasyNotion\Property\TypeFunction;
use EasyNotion\Entity\PropertyItem;

class Rollup
{
    public TypeRollup $type;
    public TypeFunction $function;

    public ?float $number;
    public ?Date $date;
    public array $results;
    public ?\stdClass $incomplete;

    public function __construct(array $map)
    {
        $this->type = TypeRollup::from($map['type']);
        $this->function = TypeFunction::from($map['function'] ?? 'count_all');

        $val = $map[$this->type->value] ?? null;
        match($this->type) {
            TypeRollup::Number => $this->number = is_numeric($val) ? (float)$val : null,
            TypeRollup::Date => $this->date = is_array($val) ? new Date($val) : null,
            TypeRollup::LiteralArray => $this->results = array_map(fn($item) => new PropertyItem($item), $val ?? []),
            TypeRollup::Incomplete => $this->incomplete = new \stdClass(),
            TypeRollup::Unsupported => $this->incomplete = new \stdClass(),
        };
    }
}