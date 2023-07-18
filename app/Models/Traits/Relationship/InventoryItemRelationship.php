<?php

namespace App\Models\Traits\Relationship;

use App\Models\InventoryItemImage;

trait InventoryItemRelationship
{
    public function inventoryImage(){
        return $this->hasMany(InventoryItemImage::class);
    }
}
