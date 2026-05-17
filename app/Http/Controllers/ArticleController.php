<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Category;

class ArticleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create']),
        ];
    }

    public function create(){
        return view('article.create');
    }

    public function index(){
        // in index visualizza solo 6 articoli per pagina in ordine decrescente di creazione
        // articoli accetti dal revisore con ::where('is_accepted', true)
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(3);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article){
        return view('article.show', compact('article'));
    }

    public function byCategory(Category $category){
        // articles è una variabile che contiene la collezione di articoli che appartengono alla categoria
         $articles = $category->articles()->where('is_accepted', true)->paginate(3);
        // passami tutti gli articoli che appartengono alla categoria - risultato collezione di articoli (relazione one to many) e la categoria
        return view('article.byCategory', [ 'articles'=>$articles, 'category'=> $category ]);
    }

}
