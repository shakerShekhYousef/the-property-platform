<?php

namespace App\Models;

use App\Models\Traits\Relationship\PropertyRelationship;
use App\Models\Traits\Scope\PropertyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory,PropertyRelationship,PropertyScope;

    protected $guarded=[];
}
