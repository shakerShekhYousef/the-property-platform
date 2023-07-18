<?php

namespace App\Models;

use App\Models\Traits\Relationship\MaintenanceRequestStatusRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequestStatus extends Model
{
    use HasFactory,MaintenanceRequestStatusRelationship;
}
