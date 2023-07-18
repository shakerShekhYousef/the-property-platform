<?php

namespace App\Models\Traits\Relationship;

use App\Models\LeadType;

trait LeadTypeRelationship
{
    public function leadStatuses(){
        return $this->hasMany(LeadType::class);
    }
}
