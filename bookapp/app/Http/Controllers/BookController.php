<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([ // Note that some better security was added
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'dateReleased' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Validate image
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->dateReleased = $request->dateReleased;

        if ($request->hasFile('image')) { // This code has to be after the '$book = new Book();' code so that the
            // $book is declared, however, before the book is saved, so before the '$book->save();'.

            // Delete the old image if it exists
            if ($book->image_path && Storage::exists($book->image_path)) {
                Storage::delete($book->image_path);
            }
    
            // Store the new image
            $imagePath = $request->file('image')->store('book_covers', 'public');
            $book->image_path = $imagePath;
        }

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
            'dateReleased' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Optional image validation
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->dateReleased = $request->dateReleased;

        // Handle image upload if there is a new image
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($book->image_path && Storage::exists($book->image_path)) {
                Storage::delete($book->image_path);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('book_covers', 'public');
            $book->image_path = $imagePath;
        }

        $book->save();

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