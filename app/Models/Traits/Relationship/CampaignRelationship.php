<?php

namespace App\Models\Traits\Relationship;

use App\Models\CampaignUtmCampaign;
use App\Models\CampaignUtmMedium;
use App\Models\CampaignUtmSource;
use App\Models\Lead;
use App\Models\User;

trait CampaignRelationship
{
    public function leads(){
        return $this->hasMany(Lead::class);
    }
    public function CampaignUTMSources(){
        return $this->hasMany(CampaignUtmSource::class);
    }
    public function CampaignUTMMediums(){
        return $this->hasMany(CampaignUtmMedium::class);
    }
    public function CampaignUtmCampaigns()
    {
        return $this->hasMany(CampaignUtmCampaign::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'campaign_user','user_id','campaign_id');
    }

}
