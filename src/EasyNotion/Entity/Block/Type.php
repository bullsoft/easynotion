<?php
namespace EasyNotion\Entity\Block;

use EasyNotion\Common\TypeInterface;
use EasyNotion\Entity\Block\Type\Base;
use EasyNotion\Entity\Block\Type\Paragraph;
use EasyNotion\Entity\Block\Type\BulletedListItem;
use EasyNotion\Entity\Block\Type\NumberedListItem;
use EasyNotion\Entity\Block\Type\ToDo;
use EasyNotion\Entity\Block\Type\Toggle;
use EasyNotion\Entity\Block\Type\Code;
use EasyNotion\Entity\Block\Type\ChildPage;
use EasyNotion\Entity\Block\Type\ChildDatabase;
use EasyNotion\Common\FileObject;
use EasyNotion\Common\RichTextObject\Link;
use EasyNotion\Common\RichTextObject\Type\Equation;
use EasyNotion\Entity\Block\Type\Column;
use EasyNotion\Entity\Block\Type\ColumnList;
use EasyNotion\Entity\Block\Type\Template;
use EasyNotion\Entity\Reference;
use EasyNotion\Entity\Block\Type\SyncedBlock;
use EasyNotion\Entity\Block\Type\Table;
use EasyNotion\Entity\Block\Type\Heading;

enum Type: string implements TypeInterface
{
    case Paragraph = 'paragraph';
    case BulletedListItem = 'bulleted_list_item';
    case NumberedListItem = 'numbered_list_item';
    case Toggle = 'toggle';
    case Code = 'code';
    case ToDo = 'to_do';
    case Quote = 'quote';
    case Callout = 'callout';
    case SyncedBlock = 'synced_block';
    case Template = 'template';
    case Column = 'column';
    case ChildPage = 'child_page';
    case ChildDatabase = 'child_database';
    case Embed = 'embed';
    case Image = 'image';
    case Video = 'video';
    case File = 'file';
    case Pdf = 'pdf';
    case Bookmark = 'bookmark';
    case Equation = 'equation';
    case Divider = 'divider';
    case TableOfContents = 'table_of_contents';
    case Breadcrumb = 'breadcrumb';
    case ColumnList = 'column_list';
    case LinkPreview = 'link_preview';
    case LinkToPage = 'link_to_page';
    case Header1 = 'heading_1';
    case Header2 = 'heading_2';
    case Header3 = 'heading_3';
    case Table = 'table';

    public function resolve(array|string $val): Base|Paragraph|BulletedListItem|NumberedListItem|ToDo|Toggle|Code|ChildPage|ChildDatabase|FileObject|Link|Equation|Column|ColumnList|Template|Reference|SyncedBlock|Table|\stdClass
    {
        if (is_string($val)) {
            return new Link($val);
        }
        return match($this) {
            self::Paragraph => new Paragraph($val),
            self::Header1, self::Header2, self::Header3 => new Heading($val),
            self::BulletedListItem => new BulletedListItem($val),
            self::NumberedListItem => new NumberedListItem($val),
            self::ToDo => new ToDo($val),
            self::Toggle => new Toggle($val),
            self::Code => new Code($val),
            self::ChildPage => new ChildPage($val),
            self::ChildDatabase => new ChildDatabase($val),
            self::Image, self::Video, self::File, self::Pdf => new FileObject($val),
            self::Embed, self::Bookmark, self::LinkPreview => new Link($val['url'] ?? ''),
            self::Equation => new Equation($val['expression'] ?? ''),
            self::Divider, self::Breadcrumb, self::TableOfContents => new \stdClass(),
            self::Column => new Column($val),
            self::ColumnList => new ColumnList($val),
            self::Template => new Template($val),
            self::LinkToPage => new Reference($val),
            self::SyncedBlock => new SyncedBlock($val),
            self::Table => new Table($val),
            self::Callout, self::Quote => new Base($val),
        };
    }
}