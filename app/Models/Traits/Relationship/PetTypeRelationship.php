<?php

namespace App\Models\Traits\Relationship;

use App\Models\TenantPet;

trait PetTypeRelationship
{
    public function tenantPets(){
        return $this->hasMany(TenantPet::class);
    }
}
