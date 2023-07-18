<?php

namespace App\Models;

use App\Models\Traits\Relationship\FurnitureTypeRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureType extends Model
{
    use HasFactory,FurnitureTypeRelationship;
}
