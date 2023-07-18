<?php

namespace App\Models;

use App\Models\Traits\Relationship\LeadStatusRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadStatus extends Model
{
    use HasFactory,LeadStatusRelationship;
}
