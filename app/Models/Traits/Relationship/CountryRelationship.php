<?php

namespace App\Models\Traits\Relationship;

use App\Models\City;

trait CountryRelationship
{
    public function cities(){
        return $this->hasMany(City::class);
    }
}
