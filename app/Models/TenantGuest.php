<?php

namespace App\Models;

use App\Models\Traits\Relationship\TenantGuestRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantGuest extends Model
{
    use HasFactory,TenantGuestRelationship;
}
