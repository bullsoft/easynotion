<?php
namespace EasyNotion\Entity\Block;

enum Type: string
{
    case Paragraph = 'paragraph';
    case BulletedListItem = 'bulleted_list_item';
    case NumberedListItem = 'numbered_list_item';
    case Toggle = 'toggle';
    case ToDo = 'to_do';
    case Quote = 'quote';
    case Callout = 'callout';
    case SyncedBlock = 'synced_block';
    case Template = 'template';
    case Column = 'column';
    case ChildPage = 'child_page';
    case ChildDatabase = 'child_database';
    case Header1 = 'header_1';
    case Header2 = 'header_2';
    case Header3 = 'header_3';
    case Table = 'table';
}