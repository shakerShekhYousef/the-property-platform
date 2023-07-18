<?php

namespace App\Models\Traits\Scope;

trait UserScope
{
    public function scopeRole($query,$id){

        $query->where('role_id','like', '%' .$id. '%');
    }
    public function scopeLanguages($query,$name){
        $query->where('language','like', '%' .$name. '%');
    }
   
    
}
