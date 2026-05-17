<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    // INDEX
    public function index(){
        // passiamo nella variabile il primo articolo in cui nella riga della colonna is_accepted è null ovvero non ancora accettato
        // ritorniamo la view con la variabile (article_to_check)
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    // ACCETTARE ARTICOLO
    // dependency injection di article
    public function accept(Article $article){
         // singolo articolo accettato con setAccepted e messaggio di accettazione
        $article->setAccepted(true);
        return redirect()
        ->back()
        ->with('acceptMessage', "Hai accettato articolo $article->title");
    }

    // RIFIUTO ARTICOLO
    // dependency injection di article
    public function reject(Article $article){
        // singolo articolo rifiutato con setAccepted e messaggio di rifiuto
        $article->setAccepted(false);
        return redirect()
        ->back()
        ->with('rejectMessage', "Hai rifiutato articolo $article->title");
    }

    // INVIO MAIL PER DIVENTARE REVISORE
    public function becomeRevisor(){
        Mail::to('admin@riuso.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('successMailMessage', 'Hai inviato la richiesta di diventare revisore');
    }

    // RENDI REVISORE
    // funzione per rendere un utente revisore - dependency injection di user
    public function makeRevisor(User $user){
        // richiamo la funzione make-user-revisor a cui passiamo l'email dell'utente che vogliamo rendere revisore
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }
}


