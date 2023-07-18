<?php

namespace App\Models\Traits\Relationship;

use App\Models\Country;
use App\Models\Lead;
use App\Models\Property;
use App\Models\Tenant;

trait CityRelationship
{
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function leads(){
        return $this->hasMany(Lead::class);
    }
    public function properties(){
        return $this->hasMany(Property::class);
    }
    public function tenants(){
        return $this->hasMany(Tenant::class);
    }

}
