<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Image;

class Article extends Model
{
    
    use Searchable;

    protected $fillable = [
        'title',
        'description',
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

    // RELAZIONE ONE TO MANY
    // funzione di relazione tra tabelle
    // un articolo ha molti immagini
    public function images(): HasMany
    {
    return $this->hasMany(Image::class);
    }




    // FUNZIONE ACCETTARE O MENO ARTICOLO
    // funzione per accettare un articolo o meno
    public function setAccepted($value){
        // prendiamo il valore is_accepted è lo valorizziamo con il valore di $value (valore passato dall'utente) e lo salviamo
        // ritorniamo true ovvero la modifica va a buon fine
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    // FUNZIONE CONTEGGIO ARTICOLO DA REVISIONARE
    // funzione per conteggio articoli da revisionare
    public static function toBeRevisedCount(){
        // prendiamo solo gli articoli con is_accepted = null -> restituziona una collezione
        // a questa collezione applichiamo la funzione count per contare gli articoli non ancora revisionati
        return Article::where('is_accepted', null)->count();
    }

    // FUNZIONE ARRAY PER INDICIZAZZIONE ARTICOLO
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category //richiamiamo la relazione con category e non la colonna
        ];
    }
}
