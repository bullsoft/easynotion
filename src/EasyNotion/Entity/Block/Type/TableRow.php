<?php
namespace EasyNotion\Entity\Block\Type;
use EasyNotion\Common\Collection;

class TableRow
{
    // array of Collection('rich_text', $list)
    public array $table_row;
    
    public function __construct(array $list)
    {
        foreach($list as $subList) {
            $this->table_row[] = new Collection('rich_text', $subList);
        }
    }
}