<?php
namespace EasyNotion\Entity\Block\Type;
use EasyNotion\Entity\Reference;


class SyncedBlock extends Base
{
    /**
     * "synced_form": {"block_id": "original_synced_block_id", "type":"block_id"}
     */
    public ?Reference $synced_from = null; 
}