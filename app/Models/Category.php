<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = ['name' ,'description'];

    /*
     * one-to-many relationship
     */
    public function recipes() :HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
