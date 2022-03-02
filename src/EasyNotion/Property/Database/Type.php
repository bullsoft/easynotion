<?php
namespace EasyNotion\Property\Database;

enum Type: string
{
    case Title = 'title';
    case RichText = 'rich_text';
    case Number = 'number';
    case Select = 'select';
    case MultiSelect = 'multi_select';
    case Date = 'date';
    case People = 'people';
    case Files = 'files';
    case Checkbox = 'checkbox';
    case Url = 'url';
    case Email = 'email';

    case PhoneNumber = 'phone_number';
    case Formula = 'formula';
    case Relation = 'relation';
    case Rollup = 'rollup';

    case CreatedTime = 'created_time';
    case CreatedBy = 'created_by';
    case LastEditedTime = 'last_edited_time';
    case LastEditedBy = 'last_edited_by';
}