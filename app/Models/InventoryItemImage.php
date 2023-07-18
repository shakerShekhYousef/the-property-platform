<?php

namespace App\Models;

use App\Models\Traits\Relationship\InventoryItemImageRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItemImage extends Model
{
    use HasFactory,InventoryItemImageRelationship;

    protected $guarded=[];
}
