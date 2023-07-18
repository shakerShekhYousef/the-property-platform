<?php

namespace App\Models\Traits\Relationship;

use App\Models\LeadInquiry;

trait LeadInquiriesLocationRelationship
{
    public function leadInquiry(){
        return $this->belongsTo(LeadInquiry::class);
    }
}
