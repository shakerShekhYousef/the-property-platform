<?php

namespace App\Models\Traits\Relationship;

use App\Models\Lead;
use App\Models\LeadType;

trait LeadStatusRelationship
{
    public function leads(){
        return $this->hasMany(Lead::class);
    }

    public function leadType(){
        return $this->belongsTo(LeadType::class,'type_id','id');
    }

}
