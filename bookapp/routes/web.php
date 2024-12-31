<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

// Homepage (Welcome Page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes for books
// The create part of the CRUD website's books
Route::get('/add_book', [BookController::class, 'addBookForm'])->name('book.add.form'); // Show the form to add a book
Route::post('/add_book', [BookController::class, 'store'])->name('book.add');  // Add a book (actually add the book from the information given)

// The read part of the CRUD website's books
Route::get('/books', [BookController::class, 'index'])->name('books');  // Show every book
Route::get('books/show_book/{id}', [BookController::class, 'show'])->name('book.show');

// The update part of the CRUD website's books
Route::get('books/edit_books/{id}', [BookController::class, 'edit'])->name('book.edit'); // Display the edit form
Route::put('books/edit_books/{id}', [BookController::class, 'update'])->name('book.update'); // Actually edit the form

// The delete part of the CRUD website's books
Route::delete('books/{id}', [BookController::class, 'destroy'])->name('book.delete');

// Routes for the authors
// The create part of the CRUD website's authors
Route::get('authors/add_author', [AuthorController::class, 'addAuthorForm'])->name('author.add.form'); // Show the form to add an author
Route::post('authors/add_author', [AuthorController::class, 'store'])->name('author.add');  // Add an author (actually add the author from the information given)

// The read part of the CRUD website's authors
Route::get('authors', [AuthorController::class, 'index'])->name('authors');  // Show every author
Route::get('authors/show_author/{id}', [AuthorController::class, 'show'])->name('author.show');

// The update part of the CRUD website's authors
Route::get('authors/edit_author/{id}', [AuthorController::class, 'edit'])->name('author.edit'); // Display the edit form
Route::put('authors/edit_author/{id}', [AuthorController::class, 'update'])->name('author.update'); // Actually edit the form

// The delete part of the CRUD website's authors
Route::delete('authors/{id}', [AuthorController::class, 'destroy'])->name('author.delete');