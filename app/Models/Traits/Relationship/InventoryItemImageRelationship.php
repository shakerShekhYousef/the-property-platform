<?php

namespace App\Models\Traits\Relationship;

use App\Models\InventoryItem;

trait InventoryItemImageRelationship
{
    public function inventoryItem(){
        return $this->belongsTo(InventoryItem::class);
    }
}
