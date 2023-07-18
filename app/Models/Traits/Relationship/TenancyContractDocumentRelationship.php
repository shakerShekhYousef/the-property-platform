<?php

namespace App\Models\Traits\Relationship;



use App\Models\TenancyContract;

trait TenancyContractDocumentRelationship
{
    public function tenancyContract(){
        return $this->belongsTo(TenancyContract::class);
    }
}
