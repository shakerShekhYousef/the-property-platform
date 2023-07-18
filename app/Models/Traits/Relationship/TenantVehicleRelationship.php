<?php

namespace App\Models\Traits\Relationship;

use App\Models\Tenant;
use App\Models\VehicleType;

trait TenantVehicleRelationship
{
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }
    public function tenantVehicleType(){
        return $this->belongsTo(VehicleType::class);
    }
}
