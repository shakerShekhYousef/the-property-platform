<?php

namespace App\Models;

use App\Models\Traits\Relationship\CampaignUtmSourceRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignUtmSource extends Model
{
    use HasFactory,CampaignUtmSourceRelationship;
    protected $guarded=[];

}
