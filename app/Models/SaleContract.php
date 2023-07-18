<?php

namespace App\Models;

use App\Models\Traits\Relationship\SaleContractRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleContract extends Model
{
    use HasFactory,SaleContractRelationship;
}
