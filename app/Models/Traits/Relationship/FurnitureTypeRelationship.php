<?php

namespace App\Models\Traits\Relationship;

use App\Models\Property;

trait FurnitureTypeRelationship
{
    public function properties(){
        return $this->hasMany(Property::class);
    }
}
