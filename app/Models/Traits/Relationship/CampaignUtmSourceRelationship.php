<?php

namespace App\Models\Traits\Relationship;

use App\Models\Campaign;
use App\Models\Lead;


trait CampaignUtmSourceRelationship
{

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }
    public function leads(){
        return $this->hasMany(Lead::class);
    }
}
