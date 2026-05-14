<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'title',
        'description',
        'img',
        'price',
        'category_id',
        'user_id'
    ];

    // RELAZIONE ONE TO MANY
    // funzione di relazione tra tabelle
    // più articoli appartengono ad una categoria
    public function category(): BelongsTo
    {
    return $this->belongsTo(Category::class);
    }

    // RELAZIONE ONE TO MANY
    // funzione di relazione tra tabelle
    // più articoli appartengono ad un user
    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class);
    }
}
