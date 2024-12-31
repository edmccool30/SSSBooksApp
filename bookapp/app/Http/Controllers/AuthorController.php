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

    public function addAuthorForm()
    {
        return view('add_author');
    }

    // Create
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nationality' => 'required',
            'birthDate' => 'required'
        ]);

        Author::create($request->all());
        return redirect()->route('authors')->with('success', 'Author added successfully!');
    }

    // Read
    public function show($id)
    {
        $author = Author::findOrFail($id); // Retrieve the author by ID
        return view('author.show', compact('author')); // Pass the author to the view
    }


    // Update
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('edit_author', compact('author'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nationality' => 'required',
            'birthDate' => 'required'
        ]);

        $author = Author::findOrFail($id);
        $author->update($request->all());
        return redirect()->route('authors')->with('success', 'Author has been updated');
    }

    // Delete
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        // Delete all books related to this author so that books do not have blank authors
        $author->books()->delete();
        $author->delete();
        return redirect()->route('authors')->with('success', 'Author and associated books deleted successfully!');
    }
}