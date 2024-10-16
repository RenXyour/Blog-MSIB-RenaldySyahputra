<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio'  => 'nullable|string',
        ]);

        try {
            Author::create($request->all());
            return redirect()->route('authors.index')->with('success', 'Author created successfully');
        } catch (\Exception $err) {
            return redirect()->route('authors.index')->with('error', $err->getMessage());
        }
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio'  => 'nullable|string',
        ]);

        try {
            $author->update($request->all());
            return redirect()->route('authors.index')->with('success', 'Author updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('authors.index')->with('error', $err->getMessage());
        }
    }

    public function destroy(Author $author)
    {
        try {
            $author->delete();
            return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
        } catch (\Exception $err) {
            return redirect()->route('authors.index')->with('error', $err->getMessage());
        }
    }
}
