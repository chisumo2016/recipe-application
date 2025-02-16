<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /*
     * Mass Assignable Attributes
     */
    protected $fillable = [
            'name',
            'description',
            'ingredients',
            'instructions',
            'image',
    ];
}
