<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

// Homepage (Welcome Page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes for books
//The create part of the CRUD website's books
Route::get('/add_book', [BookController::class, 'addBookForm'])->name('book.add.form'); // Show the form to add a book
Route::post('/add_book', [BookController::class, 'store'])->name('book.add');  // Add a book (actually add the book from the information given)
// The read part of the CRUD website's books
Route::get('/books', [BookController::class, 'index'])->name('books');  // Show every book
Route::get('show_books/{id}', [BookController::class, 'show'])->name('book.show');
// The update part of the CRUD website's books
Route::get('show_books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('show_books/{id}', [BookController::class, 'update'])->name('books.update');
// The delete part of the CRUD website's books
Route::get('show_books/{id}/delete', [BookController::class, 'delete'])->name('book.delete');

// Routes for the authors
// The create part of the CRUD website's authors
Route::get('/add_author', [AuthorController::class, 'addAuthorForm'])->name('author.add.form'); // Show the form to add an author
Route::post('/add_author', [AuthorController::class, 'store'])->name('author.add');  // Add an author (the actually add the author from the information given)
// The read part of the CRUD website's authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors');  // Show every author
Route::get('show_author/{id}', [AuthorController::class, 'show'])->name('author.show');
// The update part of the CRUD website's authors
Route::get('show_author/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('show_author/{id}', [AuthorController::class, 'update'])->name('author.update');
// The delete part of the CRUD website's authors
Route::get('show_author/{id}/delete', [AuthorController::class, 'delete'])->name('author.delete');