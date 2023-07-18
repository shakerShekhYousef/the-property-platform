<?php

namespace App\Models;

use App\Models\Traits\Relationship\TenancyContractDocumentRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenancyContractDocument extends Model
{
    use HasFactory,TenancyContractDocumentRelationship;
}
