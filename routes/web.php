<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

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