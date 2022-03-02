<?php
namespace EasyNotion\Common\FileObject\Type;
use EasyNotion\Entity\Common\FileObject\Type;
class File
{
    public string $type = Type::File;
    public string $expiry_time;
}