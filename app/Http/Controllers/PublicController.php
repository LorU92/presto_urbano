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
}
