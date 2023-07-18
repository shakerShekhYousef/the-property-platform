<?php

namespace App\Models\Traits\Relationship;

use App\Models\Tenant;

trait TenantDocumentRelationship
{
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }
}
