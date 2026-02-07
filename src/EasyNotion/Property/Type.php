<?php
namespace EasyNotion\Property;

use EasyNotion\Common\TypeInterface;

enum Type: string implements TypeInterface
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

    public function resolve(array|string $val): mixed
    {
        return match($this) {
            self::Title, self::RichText, self::Email, self::Url, self::PhoneNumber => $val,
            self::Number => is_numeric($val) ? (strpos($val, '.') !== false ? (float)$val : (int)$val) : null,
            self::Select, self::MultiSelect => is_array($val) ? $val : [],
            self::Date => is_array($val) ? new Value\Date($val) : null,
            self::Checkbox => is_bool($val) || $val === 'true' || $val === 'false' ? filter_var($val, FILTER_VALIDATE_BOOLEAN) : null,
            self::People, self::Files, self::Formula, self::Relation, self::Rollup => $val,
            self::CreatedTime, self::LastEditedTime => !empty($val) ? new \DateTime($val) : null,
            self::CreatedBy, self::LastEditedBy => is_array($val) ? new \EasyNotion\Entity\User($val) : null,
        };
    }
}