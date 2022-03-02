<?php
namespace EasyNotion\Entity;

enum ParentType: string
{
    case Page = 'page_id';
    case Database = 'database_id';
    case Workspace = 'workspace';
}