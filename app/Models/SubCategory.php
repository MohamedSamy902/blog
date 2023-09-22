<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

class SubCategory extends Model
{
    use HasFactory, HasRoles, HasTranslations;


    protected $fillable = ['name', 'category_id', 'peart_id'];

}
