<?php

namespace App\Models;

use App\Models\Traits\Relationship\CampaignUtmMediumRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignUtmMedium extends Model
{
    use HasFactory,CampaignUtmMediumRelationship;
    protected $table = 'campaign_utm_mediums';
    protected $guarded=[];

}
