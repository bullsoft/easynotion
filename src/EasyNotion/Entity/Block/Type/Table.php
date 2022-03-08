<?php
namespace EasyNotion\Entity\Block\Type;

class Table extends Base
{
    public int $table_width;
    public bool $has_column_header;
    public bool $has_row_header;

    public function __construct(array $map)
    {
        $this->children = new TableRow($map['children']);
        $this->table_width = $map['table_width'];
        $this->has_column_header = $map['has_column_header'];
        $this->has_row_header = $map['has_row_header'];
    }
}