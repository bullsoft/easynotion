<?php
namespace EasyNotion\Entity\Block;

class Reference
{
    public string $type = 'block_id';
    public string $block_id;

    public function __construct(string $blockId)
    {
        $this->block_id = $blockId;
    }
}