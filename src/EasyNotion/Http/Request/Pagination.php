<?php

namespace EasyNotion\Http\Request;

class Pagination implements \Stringable, \JsonSerializable
{
    public function __construct(
        public readonly ?string $start_cursor,
        public readonly ?int $page_size
    )
    {
        
    }

    public function __toString(): string
    {
        return http_build_query($this->__toArray());
    }

    public function __toArray(): array
    {
        return [
            "start_cursor" => $this->start_cursor,
            "page_size" => $this->page_size,
        ];
    }
    #[\ReturnTypeWillChange] 
    public function jsonSerialize() {
        return $this->__toArray();
    }
}