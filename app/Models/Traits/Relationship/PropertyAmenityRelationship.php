<?php

namespace App\Models\Traits\Relationship;

use App\Models\Property;

trait PropertyAmenityRelationship
{
     public function properties(){
        return
            $this->belongsToMany(
                Property::class,
                'property_amenity_property',
                'property_id',
                'property_amenity_id');
    }

}
