<?php

namespace App\Models;

use App\Models\Traits\Relationship\InventoryItemRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory,InventoryItemRelationship;

    protected $guarded = [];
}
