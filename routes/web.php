<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\BooksController::class, 'index'])->name("books");
Route::get('/addBook', [\App\Http\Controllers\BooksController::class, 'addBooks'])->name('add_books');
Route::get('/editBook/{id}', [\App\Http\Controllers\BooksController::class, 'editBooks'])->name('edit_books');
Route::post('/book/create', [\App\Http\Controllers\BooksController::class, 'create'])->name('book_create');
Route::post('/book/update', [\App\Http\Controllers\BooksController::class, 'update'])->name('book_update');
Route::post('/book/delete', [\App\Http\Controllers\BooksController::class, 'delete'])->name('book_delete');

Route::get('/authors', [\App\Http\Controllers\AuthorsController::class, 'index'])->name('authors');
Route::get('/addAuthors', [\App\Http\Controllers\AuthorsController::class, 'addAuthors'])->name('add_authors');
Route::get('/editAuthors/{id}', [\App\Http\Controllers\AuthorsController::class, 'editAuthors'])->name('edit_authors');
Route::post('/author/create', [\App\Http\Controllers\AuthorsController::class, 'create'])->name('author_create');
Route::post('/author/update', [\App\Http\Controllers\AuthorsController::class, 'update'])->name('author_update');
Route::post('/author/delete', [\App\Http\Controllers\AuthorsController::class, 'delete'])->name('author_delete');
