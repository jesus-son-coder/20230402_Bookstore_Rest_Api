<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        if(!$book) {
            return response()->json(['message' => 'Book not found'], 404); // Return 404 if the book doesn't exist
        }
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        if(!$book) {
            return response()->json(['message' => 'Book not found'], 404); // Return 404 if the book doesn't exist
        }
        $book->update($request->all());
        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if(!$book) {
            return response()->json(['message' => 'Book not found'], 404); // Return 404 if the book doesn't exist
        }
        $book->delete();
        return response()->json(['message' => 'Book deleted'], 200);
    }
}
