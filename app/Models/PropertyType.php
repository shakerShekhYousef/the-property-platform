<?php

namespace App\Models;

use App\Models\Traits\Relationship\PropertyTypeRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory,PropertyTypeRelationship;
    protected $guarded=[];
}
