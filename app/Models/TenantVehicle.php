<?php

namespace App\Models;

use App\Models\Traits\Relationship\TenantVehicleRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantVehicle extends Model
{
    use HasFactory,TenantVehicleRelationship;
}
