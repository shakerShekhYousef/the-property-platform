<?php

namespace App\Models;

use App\Models\Traits\Relationship\LeadRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Scope\LeadScope;

class Lead extends Model
{
    use HasFactory,LeadRelationship,LeadScope;
    protected $guarded=[];

}
