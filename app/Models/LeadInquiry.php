<?php

namespace App\Models;

use App\Models\Traits\Relationship\LeadInquiryRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadInquiry extends Model
{
    use HasFactory,LeadInquiryRelationship;
    protected $guarded=[];

}
