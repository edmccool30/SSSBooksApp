<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.authors', compact('authors')); // Corrected view path
    }

    public function addAuthorForm()
    {
        return view('authors.add_author'); // Corrected view path
    }

    // Create
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required',
            'nationality' => 'required',
            'birthdate' => 'required'
        ]);

        // Create the new author, ensuring the birthDate is stored as a date object
        Author::create([
            'name' => $request->name,
            'nationality' => $request->nationality,
            'birthdate' => $request->birthdate
        ]);

        return redirect()->route('authors')->with('success', 'Author added successfully!');
    }

    // Read
    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.show_author', compact('author')); // Corrected view path
    }

    // Update
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit_author', compact('author')); // Corrected view path
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nationality' => 'required',
            'birthdate' => 'required'
        ]);

        $author = Author::findOrFail($id);
        $author->update($request->all());

        // Redirect to the author's show page after update
        return redirect()->route('author.show', $author->id)->with('success', 'Author has been updated');
    }

    // Delete
    public function deleteConfirmation($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.delete_author', compact('author')); // Pass the author to the confirmation view
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        // Delete the author's books if needed, and then delete the author
        $author->books()->delete(); // Optional, if you want to delete the books related to this author
        $author->delete();

        // Redirect after deletion
        return redirect()->route('authors')->with('success', 'Author deleted successfully!');
    }
}
