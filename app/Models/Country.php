<?php

namespace App\Models;

use App\Models\Traits\Relationship\CountryRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory,CountryRelationship;
}
