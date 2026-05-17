<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RevisorController;

// ROTTA HOME
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// ROTTA ARTICLE - CREATE
Route::get('/article/create', [ArticleController::class, 'create'])->name('create.article');

// ROTTA ARTICLE - INDEX
Route::get('/article/index', [ArticleController::class, 'index'])->name('index.article');

// ROTTA ARTICLE - SHOW
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('show.article');

// ROTTA CATEGORY
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

// ROTTA REVISORE
Route::get('/revisore/index', [RevisorController::class, 'index'])->name('index.revisor');

// ROTTA REVISORE - ACCEPT
// rotta patch per modificare solo uno o due campi di una risorsa esistente. In modo da non dover inviare tutto l'oggetto
Route::patch('/revisore/accept/{article}', [RevisorController::class, 'accept'])->middleware('isRevisor')->name('accept.revisor');

// ROTTA REVISORE - REJECT
// rotta prottetta con middleware('isRevisor') -> controlla se l'utente autenticato ha il ruolo di revisore
// middleware custom in cui abbiamo creato la classe IsRevisor dentro RevisorController e la richiamiamo qui
Route::patch('/revisore/reject/{article}', [RevisorController::class, 'reject'])->middleware('isRevisor')->name('reject.revisor');

// ROTTA MAIL - RICHIESTA DIVENTA REVISORE
Route::get('/send-mail', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

// ROTTA MAIL - RENDI REVISORE
Route::get('/revisor/make/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');