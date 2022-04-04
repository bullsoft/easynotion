<?php
namespace EasyNotion\Common;

class UUIDv4 implements \Stringable, \JsonSerializable
{
    public readonly string $value;

    public function __construct(string $val)
    {
        $pattern = "/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i";
        $result = preg_match($pattern, $val);
        if($result !== 1) {
            throw new \ValueError("Not a leagal UUID v4 string");
        }
        $this->value = $val;
    }

    public static function create(string $val): self
    {
        $object = new self($val);
        return $object;
    }

    public function get(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}