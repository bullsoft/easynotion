<?php

namespace EasyNotion\Entity;

enum Type: string
{
    case Database = 'database';
    case Page = 'page';
    case Block = 'block';
    case User = 'user';
    case PropertyItem = 'property_item';
    case PageOrDatabase = 'page_or_database';
}