<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    // RELAZIONE ONE TO MANY
    // funzione di relazione tra tabelle
    // Una categoria ha molti articoli
    public function articles() : HasMany
    {
    return $this->hasMany(Article::class);
    }
}
