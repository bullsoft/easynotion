<?php
namespace EasyNotion\Property\Value;
use EasyNotion\Property\TypeFormula;

class Formula
{
    public TypeFormula $type;

    // type specific
    public ?string $string;
    public ?float $number;
    public ?bool $boolean;
    public ?Date $date;

    public function __construct(array $map)
    {
        $this->type = TypeFormula::from($map['type']);
        $val = $map[$this->type->value] ?? null;
        match($this->type) {
            TypeFormula::LiteralString => $this->string = $val,
            TypeFormula::Number => $this->number = is_numeric($val) ? (float)$val : null,
            TypeFormula::LiteralBoolean => $this->boolean = is_bool($val) ? $val : ($val === 'true' || $val === true),
            TypeFormula::Date => $this->date = is_array($val) ? new Date($val) : null,
        };
    }
}