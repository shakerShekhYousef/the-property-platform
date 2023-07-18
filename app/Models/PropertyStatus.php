<?php

namespace App\Models;

use App\Models\Traits\Relationship\PropertyStatusRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyStatus extends Model
{
    use HasFactory,PropertyStatusRelationship;
    protected $guarded=[];

}
