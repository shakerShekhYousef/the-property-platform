<?php

namespace App\Models;

use App\Models\Traits\Relationship\PropertyAmenityRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAmenity extends Model
{
    use HasFactory,PropertyAmenityRelationship;
    protected $guarded=[];

}
