<?php

namespace App\Models;

use App\Models\Traits\Relationship\MaintenanceRequestFileRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequestFile extends Model
{
    use HasFactory,MaintenanceRequestFileRelationship;
}
