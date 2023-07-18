<?php

namespace App\Models;

use App\Models\Traits\Relationship\PetTypeRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetType extends Model
{
    use HasFactory,PetTypeRelationship;
}
