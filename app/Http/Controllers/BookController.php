<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    public function create(Request $request)
    {
        // $data = $request->all();
        $data =  $this->validate($request, [
            "name" => "required|unique:book",
            "price" => "required",
            "status" => "required"
        ]);
        $book = Book::create($data);

        return response()->json($book);
    }

    public function index()
    {
        $book = Book::all();
        return response()->json($book);
    }
} 