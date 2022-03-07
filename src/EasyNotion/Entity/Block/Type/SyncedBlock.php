<?php
namespace EasyNotion\Entity\Block\Type;

class SyncedBlock extends Base
{
    /**
     * "synced_form": {"block_id": "original_synced_block_id", "type":"block_id"}
     */
    public $synced_from = null; 
}