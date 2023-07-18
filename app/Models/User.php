<?php

namespace App\Models;

use App\Models\Traits\Relationship\UserRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Scope\UserScope;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory,UserRelationship,UserScope;

protected $guarded = [];
}
