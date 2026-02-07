<?php
namespace EasyNotion\Entity\Block;
use EasyNotion\Entity\Block\Type\{
    Paragraph, Heading, Callout, NumberedListItem, 
    ToDo, Toggle, Code, ChildPage, ChildDatabase,
    Column, ColumnList, Quote, SyncedBlock, Template,
    Table, BulletedListItem,
};
use EasyNotion\Common\{
    FileObject, 
    RichTextObject\Link as Link,
    RichTextObject\Type\Equation as Equation,
};
use EasyNotion\Entity\Reference;

class Element
{
    public Type $type;
    // type specified
    public ?Paragraph $paragraph;
    public ?Heading $heading_1;
    public ?Heading $heading_2;
    public ?Heading $heading_3;
    public ?Callout $callout;
    public ?Quote $quote;
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
    public ?FileObject $file; // key: caption - array of rich text object
    public ?FileObject $pdf;
    public ?Link $bookmark;
    public ?Equation $equation;
    public ?\stdClass $divider;
    public ?\stdClass $table_of_contents;
    public ?\stdClass $breadcrumb;
    public ?Column $column;
    public ?ColumnList $column_list;
    public ?Link $link_preview;
    public ?Template $template;
    public ?Reference $link_to_page;
    public ?SyncedBlock $synced_block;
    public ?Table $table;

    public function __construct(array $map)
    {
        $this->type = Type::from($map['type']);
        $this->setValue($map);
    }

    public function setValue(array $map): static
    {
        $val = $map[$this->type->value];
        match($this->type) {
            Type::Paragraph => $this->paragraph = new Paragraph($val),
            Type::Header1   => $this->heading_1 = new Heading($val),
            Type::Header2   => $this->heading_2 = new Heading($val),
            Type::Header3   => $this->heading_3 = new Heading($val),
            Type::Callout   => $this->callout = new Callout($val),
            Type::Quote     => $this->quote = new Quote($val),
            Type::BulletedListItem => $this->bulleted_list_item = new BulletedListItem($val),
            Type::NumberedListItem => $this->numbered_list_item = new NumberedListItem($val),
            Type::ToDo   => $this->to_do = new ToDo($val),
            Type::Toggle => $this->toggle = new Toggle($val),
            Type::Code   => $this->code = new Code($val),
            Type::ChildPage     => $this->child_page = new ChildPage($val),
            Type::ChildDatabase => $this->child_database = new ChildDatabase($val),
            Type::Embed           => $this->embed = new Link($val['url']),
            Type::Image           => $this->image = new FileObject($val),
            Type::Video           => $this->video = new FileObject($val),
            Type::File            => $this->file = new FileObject($val),
            Type::Pdf             => $this->pdf = new FileObject($val),
            Type::Bookmark        => $this->bookmark = new Link($val['url']),
            Type::Equation        => $this->equation = new Equation($val['expression']),
            Type::Divider         => $this->divider = new \stdClass(),
            Type::TableOfContents => $this->table_of_contents = new \stdClass(),
            Type::Breadcrumb      => $this->breadcrumb = new \stdClass(),
            Type::ColumnList      => $this->column_list = new ColumnList($val),
            Type::Column          => $this->column = new Column($val),
            Type::LinkPreview     => $this->link_preview = new Link($val['url']),
            Type::Template        => $this->template = new Template($val),
            Type::LinkToPage      => $this->link_to_page = new Reference($val),
            Type::SyncedBlock     => $this->synced_block = new SyncedBlock($val),
            Type::Table           => $this->table = new Table($val),

        };
        return $this;
    }

    public static function create(array $map): static
    {
        $elem = new Element($map);
        return $elem;
    }
}
