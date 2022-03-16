<?php
namespace EasyNotion\Entity\Block;

enum Type: string
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
}