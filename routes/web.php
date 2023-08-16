<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RevisorController;
use Illuminate\Foundation\Events\PublishingStubs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//home
Route::get('/', [PublicController::class,'homepage'])->name('home');
//vista creazione form
Route::get('/formArticle',[ArticleController::class,'create'])->name('create');
//dettagli
Route::get('/article/detail{article}',[ArticleController::class, 'show'])->name('show');
//indice prodotti
route::get('/Articles',[ArticleController::class, 'index'])->name('article_index');
//indice categoria
route::get('/article/category{genre}',[ArticleController::class, 'show_category'])->name('show_category');

//*home revisione
route::get('/revisor/home',[RevisorController::class,'index'])->middleware('IsRevisor')->name('revisor_index');
//*accetta articolo
route::patch('/revisor/accept/{article}', [RevisorController::class, 'acceptArticle'])->name('revisor.accept');
//*rifiuta articolo
route::patch('/revisor/refuse/{article}', [RevisorController::class, 'rifuteArticle'])->name('revisor.refuse');
//*annulla articolo
route::patch('/revisor/null/{article}', [RevisorController::class, 'old'])->name('revisor.old');
//*annulla articolo ultimo
route::patch('/revisor/null', [RevisorController::class, 'old_article'])->name('revisor.oldArticle');
//*richiedere di diventare revisore
route::get('/revisor/form',[PublicController::class, 'requestRevisor'])->middleware('auth')->name('request.revisor');
route::post('/revisor/richiesta',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
//* Risposta al revisore
route::get('/revisor{user}',[RevisorController::class, 'makeRevisor'])->name('make.revisor');

//Rotta per Search
route::get('/ricerca/articolo',[PublicController::class,'searchArticles'])->name('searchArticle');

//  Rotta per icone linguaggio 
route::post('/language/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');