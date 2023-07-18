<?php

namespace App\Models\Traits\Relationship;

use App\Models\Campaign;
use App\Models\campaignUtmCampaign;
use App\Models\campaignUtmMedium;
use App\Models\campaignUtmSource;
use App\Models\City;
use App\Models\Lead;
use App\Models\User;
use App\Models\LeadProject;
use App\Models\LeadSource;
use App\Models\LeadStatus;

trait LeadRelationship
{
    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }
    public function campaignUtmCampaign(){
        return $this->belongsTo(CampaignUtmCampaign::class);
    }
    public function campaignUtmMedium(){
        return $this->belongsTo(CampaignUtmMedium::class);
    }
    public function campaignUtmSource(){
        return $this->belongsTo(CampaignUtmSource::class);
    }
    public function status(){
        return $this->belongsTo(LeadStatus::class,'status_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function leadStatus(){
        return $this->belongsTo(LeadStatus::class,'status_id','id');
    }
    public function leadSource(){
        return $this->belongsTo(LeadSource::class,'lead_source_id','id');
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function leadProject(){
        return $this->belongsTo(LeadProject::class,'project_id','id');
    }


}
