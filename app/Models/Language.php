<?php

namespace App\Models;

use App\Models\Traits\Relationship\LanguageRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory,LanguageRelationship;
}
