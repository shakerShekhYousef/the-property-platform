<?php

namespace App\Models\Traits\Relationship;

use App\Models\MaintenanceRequest;

trait MaintenanceCategoryRelationship
{
    public function maintenanceRequests(){
        return $this->hasMany(MaintenanceRequest::class);
    }

}
