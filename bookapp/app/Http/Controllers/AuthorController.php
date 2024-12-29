<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors', compact('authors'));
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('author', compact('author'));
    }

    public function store(Request $request)
    {
        $author = new Author();
        $author->name = $request->name;
        $author->nationality = $request->nationality;
        $author->birth_date = $request->birth_date;
        $author->save();

        return redirect('/author');
    }
}