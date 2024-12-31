<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

// Homepage (Welcome Page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes for books
Route::get('/books', [BookController::class, 'index'])->name('books');  // Show every book
Route::get('/books/{id}', [BookController::class, 'show'])->name('book.show'); // Show a specific book designated by its ID
Route::get('/add_book', [BookController::class, 'addBookForm'])->name('book.add.form'); // Show the form to add a book
Route::post('/add_book', [BookController::class, 'store'])->name('book.add');  // Add a book (actually add the book from the information given)

// Routes for the authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors');  // Show every author
Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('author.show');  // Show a specific author designated by their ID
Route::get('/add_author', [AuthorController::class, 'addAuthorForm'])->name('author.add.form'); // Show the form to add an author
Route::post('/add_author', [AuthorController::class, 'store'])->name('author.add');  // Add an author (the actually add the author from the information given)