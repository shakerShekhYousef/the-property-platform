<?php

namespace App\Models\Traits\Relationship;

use App\Models\MaintenanceCategory;
use App\Models\MaintenanceRequestFile;
use App\Models\MaintenanceRequestStatus;
use App\Models\Property;

trait MaintenanceRequestRelationship
{
    public function maintenanceRequestFiles(){
        return $this->hasMany(MaintenanceRequestFile::class);
    }
    public function property(){
        return $this->belongsTo(Property::class);
    }
    public function maintenanceCategory(){
        return $this->belongsTo(MaintenanceCategory::class);
    }
    public function maintenanceRequestStatus(){
        return $this->belongsTo(MaintenanceRequestStatus::class,'status_id','id');
    }
}
