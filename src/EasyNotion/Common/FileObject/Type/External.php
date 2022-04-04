<?php
namespace EasyNotion\Common\FileObject\Type;
use EasyNotion\Common\FileObject\Type;

class External
{
    public Type $type = Type::External;
    public string $url;

    public function __construct(array $map)
    {
        $this->url = $map['url'];
    }
}