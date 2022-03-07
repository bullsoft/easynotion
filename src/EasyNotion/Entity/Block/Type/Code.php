<?php
namespace EasyNotion\Entity\Block\Type;
use EasyNotion\Entity\Block\LanguageType;

class Code extends Base
{
    public LanguageType $language;

    public function __construct(array $map)
    {
        parent::__construct($map);
        $this->language = LanguageType::from($map['language']);
    }
}