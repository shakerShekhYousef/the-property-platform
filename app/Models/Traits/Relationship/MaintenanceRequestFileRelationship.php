<?php

namespace App\Models\Traits\Relationship;

use App\Models\MaintenanceRequest;

trait MaintenanceRequestFileRelationship
{
    public function maintenanceRequest(){
        return $this->belongsTo(MaintenanceRequest::class);
    }
}
