<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    protected $fillable = ['user_id' , 'recipe_id'];

    /*
     *  one-to-one relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * one-to-one relationship
     */
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
