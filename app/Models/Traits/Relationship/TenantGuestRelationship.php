<?php

namespace App\Models\Traits\Relationship;

use App\Models\Tenant;
use App\Models\TenantGuest;

trait TenantGuestRelationship
{
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function tenantGuests(){
        return $this->hasMany(TenantGuest::class);
    }

}
