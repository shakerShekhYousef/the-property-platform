<?php

namespace App\Models\Traits\Relationship;

use App\Models\PetType;
use App\Models\Tenant;

trait TenantPetRelationship
{
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function petTypes(){
        return $this->hasMany(PetType::class);
    }

}
