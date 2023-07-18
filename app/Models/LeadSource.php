<?php

namespace App\Models;

use App\Models\Traits\Relationship\LeadSourceRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadSource extends Model
{
    use HasFactory,LeadSourceRelationship;
}
