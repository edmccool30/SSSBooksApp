<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        $book = Book::findOrFail($id);
        return view('book', compact('book'));
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author_id = $request->author_id;
        $book->save();

        return redirect('/book');
    }
}