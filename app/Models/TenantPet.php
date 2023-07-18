<?php

namespace App\Models;

use App\Models\Traits\Relationship\TenantPetRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantPet extends Model
{
    use HasFactory,TenantPetRelationship;
}
