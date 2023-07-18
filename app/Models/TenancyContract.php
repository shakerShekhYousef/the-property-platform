<?php

namespace App\Models;

use App\Models\Traits\Relationship\TenancyContractRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenancyContract extends Model
{
    use HasFactory,TenancyContractRelationship;
}
