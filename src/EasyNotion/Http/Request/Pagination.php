<?php

namespace EasyNotion\Http\Request;

class Pagination implements \Stringable, \JsonSerializable
{
    public function __construct(
        public ?string $start_cursor,
        public readonly int $page_size = 20
    )
    {
        
    }

    public function __toString(): string
    {
        return http_build_query($this->__toArray());
    }

    public static function from(array $map): self
    {
        return new self($map['start_cursor'] ?? null, $map['page_size'] ?? 20);
    }

    public function __toArray(): array
    {
        $ret = [
            "page_size" => $this->page_size,
        ];
        if($this->start_cursor !== null) {
            $ret["start_cursor"] = $this->start_cursor;
        }
        return $ret;
    }
    
    #[\ReturnTypeWillChange] 
    public function jsonSerialize() 
    {
        return $this->__toArray();
    }
}