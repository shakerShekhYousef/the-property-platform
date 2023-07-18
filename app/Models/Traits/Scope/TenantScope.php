<?php

namespace App\Models\Traits\Scope;

trait TenantScope
{
    public function scopeProperty($query,$id){
        $query->where('property_id','like', '%' .$id. '%');
    }
    public function scopeCity($query,$id){
        $query->where('city_id','like', '%' .$id. '%');
    }
}
