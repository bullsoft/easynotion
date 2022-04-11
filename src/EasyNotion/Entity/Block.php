<?php
namespace EasyNotion\Entity;

use EasyNotion\Common\{
    FileObject, UnionInterface, UUIDv4
};
use EasyNotion\Common\RichTextObject\Link;
use EasyNotion\Common\RichTextObject\Type\Equation;
use EasyNotion\Entity\Block\Type as BlockType;
use EasyNotion\Entity\Type;
use EasyNotion\Entity\Block\Type\{
    BulletedListItem, ChildDatabase, ChildPage,
    Code, Column, ColumnList, Paragraph, Heading,
    NumberedListItem, SyncedBlock, Table,
    Template, ToDo, Toggle,
};
use EasyNotion\Http\{Client, Block as BlockClient};

class Block extends AbstractObject implements UnionInterface
{
    use MetaTrait;

    // Entity Type
    protected Type $object = Type::Block;
    // UUIDv4
    protected readonly UUIDv4|string $id;

    public BlockType $type;
    public bool $archived;
    public bool $has_children;

    // type specified
    public ?Paragraph  $paragraph;
    public ?Heading $header_1;
    public ?Heading $header_2;
    public ?Heading $header_3;
    public ?BulletedListItem $bulleted_list_item;
    public ?NumberedListItem $numbered_list_item;
    public ?ToDo $to_do;
    public ?Toggle $toggle;
    public ?Code $code;
    public ?ChildPage $child_page;
    public ?ChildDatabase $child_database;
    public ?Link $embed;
    public ?FileObject $image;
    public ?FileObject $video;
    public ?FileObject $file;
    public ?FileObject $pdf;
    public ?Link $bookmark;
    public ?Equation $equation;
    public ?\stdClass $divider;
    public ?\stdClass $breadcrumb;
    public ?Column $column;
    public ?ColumnList $column_list;
    public ?Link $link_preview;
    public ?Template $template;
    public ?Reference $link_to_page;
    public ?SyncedBlock $synced_block;
    public ?Table $table;

    public function __construct(array $map, public readonly ?Client $client = null)
    {
        $this->id = new UUIDv4($map['id']);
        $this->type = BlockType::from($map['type']);

        $this->setCreatedBy($map['created_by'])
             ->setCreatedTime($map['created_time'])
             ->setLastEditedBy($map['last_edited_by'])
             ->setLastEditedTime($map['last_edited_time']);

        $this->archived = $map['archived'];
        $this->has_children = $map['has_children'];
        $this->setValue($map);
    }

    public function setValue(array $map): static
    {
        $key = $this->type->value;
        $val = $map[$key];
        if($val === null) {
            $this->{$key} = null;
            return $this;
        }
        match($this->type) {
            BlockType::Paragraph => $this->paragraph = new Paragraph($val),
            BlockType::Header1, BlockType::Header2, BlockType::Header3 => $this->{$key} = new Heading($val), 
            BlockType::BulletedListItem => $this->bulleted_list_item = new BulletedListItem($val),
            BlockType::NumberedListItem => $this->numbered_list_item = new NumberedListItem($val),
            BlockType::ToDo => $this->to_do = new ToDo($val),
            BlockType::Toggle => $this->toggle = new Toggle($val),
            BlockType::Code => $this->code = new Code($val),
            BlockType::ChildPage => $this->child_page = new ChildPage($val),
            BlockType::ChildDatabase => $this->child_database = new ChildDatabase($val),
            BlockType::Embed, BlockType::Bookmark, BlockType::LinkPreview => $this->{$key} = new Link($val['url']),
            BlockType::Image, BlockType::Video, BlockType::File, BlockType::Pdf => $this->{$key} = new FileObject($val),
            BlockType::Equation => $this->equation = new Equation($val['expression']),
            BlockType::Divider, BlockType::Breadcrumb => $this->{$key} = new \stdClass(),
            BlockType::Column => $this->column = new Column($val),
            BlockType::ColumnList => $this->column_list = new ColumnList($val),
            BlockType::Template => $this->template = new Template($val),
            BlockType::LinkToPage => $this->link_to_page = new Reference($val),
            BlockType::SyncedBlock => $this->synced_block = new SyncedBlock($val),
            BlockType::Table => $this->table = new Table($val),
        };
        return $this;
    }

    public function getValue()
    {
        $key = $this->type->value;
        return $this->{$key};
    }

    public function children(int $pageSize = 20, ?string $start = null)
    {
        $blockClient = new BlockClient($this->client);
        return $blockClient->children($this->id, $pageSize, $start);
    }
}