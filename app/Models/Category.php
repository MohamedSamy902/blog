<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations, HasRoles;

    protected $translatable = ['name'];
    protected $fillable = ['name'];
}
