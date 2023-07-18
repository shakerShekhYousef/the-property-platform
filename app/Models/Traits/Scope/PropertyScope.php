<?php

namespace App\Models\Traits\Scope;

trait PropertyScope
{
    public function scopePropertyType($query,$id){
        $query->where('property_type_id','like', '%' .$id. '%');
    }

    public function scopeFurnitureType($query,$id){
        $query->where('furniture_type_id','like', '%' .$id. '%');
    }

    public function scopePropertyCategory($query,$id){
        $query->where('property_category_id','like', '%' .$id. '%');
    }

    public function scopePropertyStatus($query,$id){
        $query->where('property_status_id','like', '%' .$id. '%');
    }

    public function scopeCity($query,$id){
        $query->where('city_id','like', '%' .$id. '%');
    }

}
