<?php

namespace App\Models;

use App\Models\Traits\Relationship\MaintenanceRequestRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory,MaintenanceRequestRelationship;
}
