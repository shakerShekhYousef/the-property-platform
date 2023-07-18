<?php

namespace App\Models\Traits\Relationship;

use App\Models\Landlord;
use App\Models\Property;
use App\Models\TenancyContractDocument;
use App\Models\Tenant;

trait TenancyContractRelationship
{
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }
    public function landlord(){
        return $this->belongsTo(Landlord::class);
    }
    public function property(){
        return $this->belongsTo(Property::class);
    }
    public function TenancyContractDocuments(){
        return $this->hasMany(TenancyContractDocument::class);
    }

}
