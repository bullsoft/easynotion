<?php
namespace EasyNotion\Common;
use EasyNotion\Common\FileObject\Type;
use EasyNotion\Common\FileObject\Type\External;
use EasyNotion\Common\FileObject\Type\File;

class FileObject
{
    public Type $type;
    public ?External $external;
    public ?File $file;
}