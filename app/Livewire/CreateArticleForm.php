<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{

    use WithFileUploads;

    // CATTURARE I DATI DEL FORM
    // Variabili in cui vengono salvati i dati del form tramite wire:model

    // VALIDAZIONE DEI DATI CON MESSAGGI ERRORE 
    // Definisco le regole di validazione per i campi del form, in modo da assicurarmi che i dati inseriti dall'utente siano validi prima di salvarli nel database
    #[Validate('required', message: 'Il titolo è obbligatorio')]
    #[Validate('min:2', message: 'Il titolo è troppo corto')]
    public $title;

    #[Validate('required', message: 'La descrizione è obbligatoria')]
    #[Validate('min:3', message: 'La descrizione è troppo corta')]
    public $description;

    #[Validate('required', message: 'Il prezzo è obbligatorio')]
    public $price;

    public $img;
    public $category;
    public $article;
    
    // STORE
    public function store(){

        // VALIDAZIONE DEI DATI
        // prima di salvare i dati nel database, valido i dati inseriti dall'utente utilizzando il metodo validate, che verifica se i dati rispettano le regole di validazione definite nelle proprietà del componente. Se i dati non sono validi, viene generato un errore e il processo di salvataggio viene interrotto
        $this->validate();

        // MASS ASSIGNMENT
        // permette di creare un nuovo articolo e salvare i dati nel database in un'unica riga di codice, specificando i campi da salvare e i valori corrispondenti recuperati dalle proprietà del componente da assegnare ai dati del model

        // Se l'utente carica l'immagine salva in storage, altrimenti prendi l'immagine di default presente in public->img
        if ($this->img) {
            $img = $this->img->store('articles', 'public');
        } else {
            $img = 'default';
        }

        Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'img' => $img,
            'category_id' => $this->category,
            'user_id' => Auth::user()->id
        ]);

        // METODO RESETTARE I CAMPI DEL FORM
        // dopo aver salvato i dati nel database, pulisco i campi del form richiamando il metodo clearForm (creato da me), in modo da avere i campi vuoti per poter inserire un nuovo articolo
        $this->clearForm();

        // RITORNA ALL'HOMEPAGE CON MESSAGGIO DI SUCCESSO        
        return redirect()->route('homepage')->with('succesMessage', 'Articolo creato con successo!');
    }

    // METODO PULIRE I CAMPI DAL FORM 
    // metodo per pulire i campi del form dopo aver salvato i dati nel database protected perché è un metodo che viene utilizzato solo all'interno del componente e non deve essere accessibile dall'esterno
    protected function clearForm()
    {
        // inizializzo le proprietà del componente con valori vuoti, in modo da avere i campi del form vuoti quando viene caricato per la prima volta
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
