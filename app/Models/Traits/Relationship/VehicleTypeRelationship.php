<?php

namespace App\Models\Traits\Relationship;

use App\Models\TenantVehicle;

trait VehicleTypeRelationship
{
    public function tenantVehicles(){
        return $this->hasMany(TenantVehicle::class);
    }
}
