<?php

namespace App\Models\Traits\Relationship;

use App\Models\City;
use App\Models\Property;
use App\Models\TenantDocument;
use App\Models\TenantGuest;
use App\Models\TenantPet;
use App\Models\TenantVehicle;

trait TenantRelationship
{
    public function tenantGuests(){
        return $this->hasMany(TenantGuest::class);
    }

    public function tenantVehicles(){
        return $this->hasMany(TenantVehicle::class);
    }

    public function tenantPets(){
        return $this->hasMany(TenantPet::class);
    }

    public function tenantDocuments(){
        return $this->hasMany(TenantDocument::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function property(){
        return $this->belongsTo(Property::class);
    }

}
