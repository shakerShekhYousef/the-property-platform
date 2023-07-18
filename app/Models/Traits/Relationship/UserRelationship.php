<?php

namespace App\Models\Traits\Relationship;

use App\Models\Campaign;
use App\Models\Language;
use App\Models\Lead;
use App\Models\Role;

trait UserRelationship
{
    public function leads(){
        return $this->hasMany(Lead::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function campaigns(){
        return
            $this->belongsToMany(
                Campaign::class,
                'campaign_user',
                'campaign_id',
                'user_id');
    }

    public function languages(){
        return
            $this->belongsToMany(
                Language::class,
                'language_user',
                'user_id' ,
                'language_id');
    }

}
