<?php

namespace App\Models\Traits\Relationship;

use App\Models\Property;

trait PropertyImageRelationship
{
    public function property(){
        return $this->belongsTo(Property::class);
    }
}
