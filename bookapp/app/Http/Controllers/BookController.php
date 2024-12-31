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
        return view('books.books', compact('books')); // Corrected view path
    }

    public function addBookForm()
    {
        $authors = Author::all();
        return view('books.add_book', compact('authors')); // Corrected view path
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
        return view('books.show_book', compact('book')); // Corrected view path
    }

    // Update
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all(); // Get all authors to populate the select field for author
        return view('books.edit_book', compact('book', 'authors')); // Corrected view path
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

        return redirect()->route('book.show', $book->id)->with('success', 'Book updated successfully!');
    }

    // Delete
    public function deleteConfirmation($id)
    {
        $book = Book::findOrFail($id);
        return view('book.delete_book', compact('book'));
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        // Redirect after deletion
        return redirect()->route('books')->with('success', 'Book deleted successfully!');
    }
}