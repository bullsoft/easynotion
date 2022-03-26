<?php
namespace EasyNotion\Property\Filter\Type;

use EasyNotion\Property\Type;
use EasyNotion\Property\Filter\Operator\{
    EqualsOrNot,
    ContainsOrNot,
    StartsOrEndsWith,
    EmptyOrNot,
};

class Text extends AbstractType
{
    use EqualsOrNot, ContainsOrNot, StartsOrEndsWith, EmptyOrNot;

    public ?\stdClass $title;
    public ?\stdClass $rich_text;
    public ?\stdClass $url;
    public ?\stdClass $email;
    public ?\stdClass $phone_number;
}