<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;

// Home route / The Index
Route::get('/', function () {
    return view('welcome');
})->name('home');  // Add name for the home route

// Routes for books
Route::get('/books', [BookController::class, 'index'])->name('books');  // Show all books
Route::get('/books/{id}', [BookController::class, 'show'])->name('book.show'); // Show a specific book
Route::post('/add_books', [BookController::class, 'store'])->name('book.add');  // Add a book

// Routes for authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors');  // Show all authors
Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('author.show');  // Show a specific author
Route::post('/add_author', [AuthorController::class, 'store'])->name('author.add');  // Add an author