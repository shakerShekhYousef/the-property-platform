<?php

namespace App\Models\Traits\Relationship;

use App\Models\TenantGuest;

trait GuestTypeRelationship
{
    public function tenantGuests(){
        return $this->hasMany(TenantGuest::class);
    }

}
