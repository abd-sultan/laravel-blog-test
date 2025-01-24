<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'index'])->name('home');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // articles
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{slug}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{slug}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{slug}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

require __DIR__ . '/auth.php';
