<?php

namespace App\Models\Traits\Relationship;

use App\Models\Property;

trait PropertyCategoryRelationship
{
    public function properties(){
        return $this->hasMany(Property::class);
    }

}
