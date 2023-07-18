<?php

namespace App\Models;

use App\Models\Traits\Relationship\LeadProjectRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadProject extends Model
{
    use HasFactory,LeadProjectRelationship;
}
