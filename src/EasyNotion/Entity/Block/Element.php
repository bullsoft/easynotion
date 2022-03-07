<?php
namespace EasyNotion\Entity\Block;
use EasyNotion\Entity\Block\Type\{
    Paragraph, Heading, Callout, NumberedListItem, 
    ToDo, Toggle, Code, ChildPage, ChildDatabase,
    Column, ColumnList, SyncedBlock, Template

};
use EasyNotion\Common\{
    FileObject, 
    RichTextObject\Link as Link,
    RichTextObject\Type\Equation as Equation,
};
use EasyNotion\Entity\ParentObject;

class Element
{
    public Type $type;
    // type specified
    public ?Paragraph $paragraph;
    public ?Heading $heading_1;
    public ?Heading $heading_2;
    public ?Heading $heading_3;
    public ?Callout $callout;
    public ?NumberedListItem $numbered_list_item;
    public ?ToDo $to_do;
    public ?Toggle $toggle;
    public ?Code $code;
    public ?ChildPage $child_page;
    public ?ChildDatabase $child_database;
    public ?Link $embed;
    public ?FileObject $image;
    public ?FileObject $video;
    public ?FileObject $file; // caption - array of rich text object
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
    public ?ParentObject $link_to_page;
    public ?SyncedBlock $synced_block;


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

        };
        return $this;
    }

    public static function create(array $map): static
    {
        $elem = new Element($map);
        return $elem;
    }
}