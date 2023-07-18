<?php

namespace App\Models;

use App\Models\Traits\Relationship\LandlordRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    use HasFactory,LandlordRelationship;
}
