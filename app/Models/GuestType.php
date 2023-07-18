<?php

namespace App\Models;

use App\Models\Traits\Relationship\GuestTypeRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestType extends Model
{
    use HasFactory,GuestTypeRelationship;
}
