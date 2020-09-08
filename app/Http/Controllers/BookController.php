<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller{
    public function showAllBooks()
    {
        $books = DB::table('books')->get();
        return response()->json($books);
    }
    public function showOneBook($id)
    {
        $books = DB::table('books')->where('id', $id)
                                    ->get();
        return response()->json($book);
    }
    public function create(Request $request)
    {
        $id = uniqid();
        $content = json_decode($request->getContent());
        $book = new Book;
        $book->id = $id;
        $book->name =$request->get('name');
        $book->author = $request->get('author');
        $book->publication = $request->get('publication');
        $book->rating = $request->get('rating');
        $book->price = $request->get('price');

        $book->save();
        $book->bookID=$id;
        return response()->json($book, 201);
        
    }
    public function update(Request $request, $id)
    {
        $book = Book:: findOrFail($id);
        $content = json_decode($request->getContent());
        $book->name = $request->get('name');
        $book->author = $request->get('author');
        $book->publication = $request->get('publication');
        $book->rating = $request->get('rating');
        $book->price = $request->get('price');
        $book->save();
        $book->bookID=$id;
        return response()->json($book, 200);

    }
    public function delete($id)
    {
        Book::findOrFail($id)->delete();
        return response()->json('Delete Successfully', 200);
    }
}