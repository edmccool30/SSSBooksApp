<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id); // Author is not required as books can be written without an author, take the Voynich Manuscript for example
        return view('book', compact('book'));
    }

    public function addBookForm()
    {
        // Get all authors from the database (To select the author for your book in the add_book.blade.php form)
        $authors = Author::all();
        return view('add_book', compact('authors'));
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->dateReleased = $request->dateReleased;
        $book->save();

        return redirect()->route('books')->with('success', 'Book added successfully!');
    }
}
