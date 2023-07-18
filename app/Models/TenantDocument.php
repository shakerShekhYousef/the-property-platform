<?php

namespace App\Models;

use App\Models\Traits\Relationship\TenantDocumentRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantDocument extends Model
{
    use HasFactory,TenantDocumentRelationship;
}
