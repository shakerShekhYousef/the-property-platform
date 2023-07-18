<?php

namespace App\Models;

use App\Models\Traits\Relationship\PropertyImageRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory,PropertyImageRelationship;

    protected $guarded = [];
}
