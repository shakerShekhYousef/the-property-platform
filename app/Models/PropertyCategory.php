<?php

namespace App\Models;

use App\Models\Traits\Relationship\PropertyCategoryRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    use HasFactory,PropertyCategoryRelationship;
    protected $guarded=[];

}
