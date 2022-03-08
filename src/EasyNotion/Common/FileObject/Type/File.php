<?php
namespace EasyNotion\Common\FileObject\Type;
use EasyNotion\Common\FileObject\Type;
class File
{
    public string $type = Type::File;
    public string $expiry_time;

    public function __construct(array $map)
    {
        // @TODO
    }
}