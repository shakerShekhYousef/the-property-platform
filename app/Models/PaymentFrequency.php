<?php

namespace App\Models;

use App\Models\Traits\Relationship\PaymentFrequencyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentFrequency extends Model
{
    use HasFactory,PaymentFrequencyRelationship;
    protected $guarded=[];
    
}
