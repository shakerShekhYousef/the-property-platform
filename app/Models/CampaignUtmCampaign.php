<?php

namespace App\Models;

use App\Models\Traits\Relationship\CampaignUtmCampaignRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignUtmCampaign extends Model
{
    use HasFactory,CampaignUtmCampaignRelationship;
    protected $guarded=[];

}
