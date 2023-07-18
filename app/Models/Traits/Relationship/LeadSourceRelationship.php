<?php

namespace App\Models\Traits\Relationship;

use App\Models\Lead;

trait LeadSourceRelationship
{
    public function leads(){
        return $this->hasMany(Lead::class);
    }
}
