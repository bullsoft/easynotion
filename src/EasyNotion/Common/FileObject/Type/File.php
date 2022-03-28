<?php
namespace EasyNotion\Common\FileObject\Type;
use EasyNotion\Common\FileObject\Type;
class File
{
    public Type $type = Type::File;
    public string $url;
    public ?string $expiry_time;

    public function __construct(array $map)
    {
        $this->url = $map['url'] ?? null;
        if(isset($map['expiry_time'])) {
            $this->expiry_time = $map['expiry_time'];
        }
    }
}