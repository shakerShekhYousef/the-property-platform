<?php

namespace App\Models;

use App\Models\Traits\Relationship\LeadTypeRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadType extends Model
{
    use HasFactory,LeadTypeRelationship;
}
