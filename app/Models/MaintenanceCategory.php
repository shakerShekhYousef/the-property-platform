<?php

namespace App\Models;

use App\Models\Traits\Relationship\MaintenanceCategoryRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceCategory extends Model
{
    use HasFactory,MaintenanceCategoryRelationship;
}
