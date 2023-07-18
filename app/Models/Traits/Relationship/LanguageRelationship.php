<?php

namespace App\Models\Traits\Relationship;

use App\Models\User;

trait LanguageRelationship
{
    public function users(){
        return $this->belongsToMany(User::class,'language_user','user_id','language_id');
    }
}
