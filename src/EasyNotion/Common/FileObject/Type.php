<?php
namespace EasyNotion\Common\FileObject;

use EasyNotion\Common\TypeInterface;

enum Type: string implements TypeInterface
{
    case External = 'external';
    case File = 'file';

    public function resolve(array|string $val)
    {
        return match($this) {
            self::External => new Type\External($val),
            self::File     => new Type\File($val),
        };
    }
}