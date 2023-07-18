<?php

namespace App\Models;

use App\Models\Traits\Relationship\TenantRelationship;
use App\Models\Traits\Scope\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory,TenantRelationship,TenantScope;

    /**
     * @var mixed
     */
    protected $guarded=[];
}
