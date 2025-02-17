<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    use HasFactory;

    /*
     * Mass Assignable Attributes
     */
    protected $fillable = [
            'name',
            'description',
            'ingredients',
            'instructions',
            'image',
            'category_id',
    ];

    /*
     * Inverse on one-to-many relationship
     * One recipe belongs to one category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /*
     * One-to-many relationship
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
