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

    public function addBookForm()
    {
        $authors = Author::all();
        return view('add_book', compact('authors'));
    }

    // Create
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id', // Ensure that the author exists in the database
            'dateReleased' => 'required|date'
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->dateReleased = $request->dateReleased;
        $book->save();

        return redirect()->route('books')->with('success', 'Book added successfully!');
    }

    // Read
    public function show($id)
    {
        $book = Book::findOrFail($id); // Get the book's ID
        return view('book.show', compact('book')); // Display the book's information
    }

    // Update
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all(); // Get all authors to populate the select field for author
        return view('edit_book', compact('book', 'authors'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
            'dateReleased' => 'required|date'
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->dateReleased = $request->dateReleased;
        $book->save(); // Save the updated book

        return redirect()->route('books')->with('success', 'Book updated successfully!');
    }

    // Delete
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete(); // Delete the book from the database
        return redirect()->route('books')->with('success', 'Book deleted successfully!');
    }
}
