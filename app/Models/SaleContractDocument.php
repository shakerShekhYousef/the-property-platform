<?php

namespace App\Models;

use App\Models\Traits\Relationship\SaleContractDocumentRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleContractDocument extends Model
{
    use HasFactory,SaleContractDocumentRelationship;
}
