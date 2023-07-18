<?php

namespace App\Models;

use App\Models\Traits\Relationship\LeadInquiriesLocationRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadInquiriesLocation extends Model
{
    use HasFactory,LeadInquiriesLocationRelationship;
}
