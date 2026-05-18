<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage() {

        // in homepage visualizza solo i primi 3 articoli in ordine decrescente. 
        // articoli accetti dal revisore con ::where('is_accepted', true)
        $articles = Article::where('is_accepted', true)->Take(3)->orderBy('created_at', 'desc')->get();
        return view('homepage', compact('articles')); 
    }

        // FUNZIONE PER RICERCA DI ARTICOLO
    public function searchArticles(Request $request) {
        // mass assignment
        $query = $request->input('query');

        // interroga il motore di ricerca sugli arrticoli accettati del revisore e restituisce una collezione di articoli che corrispondono alla query inserita nel form dall'utente
        $articles = Article::search($query)->query(function ($builder) {$builder->where('is_accepted', true);})->paginate(6);
        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }

        // FUNZIONE PER SETTAGGIO LINGUA
    public function setLanguage($lang) {
        // creiamo una sessione con chiave locale e con valore $lang - prametro passato nella rotta e d'ingresso della funzione
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
