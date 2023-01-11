<?php

namespace App\Http\Controllers;

use App\Services\AuthorsService;
use App\Services\BooksService;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    private $booksService;
    private $authorsService;

    public function __construct(BooksService $booksService, AuthorsService $authorsService)
    {
        $this->booksService = $booksService;
        $this->authorsService = $authorsService;
    }

    public function index(Request $request){
        $search = $request->has('search') ? $request->search : "";
        $column = $request->has('sort_column') ? $request->sort_column : "id";
        $sort = $request->has('sort') ? $request->sort : "ASC";

        $book = $this->booksService->get($search, $column, $sort, 5);
        return view('books', compact('book', 'search', 'column', 'sort'));
    }

    public function addBooks()
    {
        $authors = $this->authorsService->get();
        return view('add_books', compact('authors'));
    }

    public function editBooks(Request $request)
    {
        $authors = $this->authorsService->get();
        $book = $this->booksService->getById($request->id);
        return view('edit_books', compact('authors', 'book'));
    }

    public function create(Request $request){
        $book = $this->booksService->create($request->name, $request->authors);
        if(!$book) {
            return response()->json(false);
        }
        return response()->json(true);
    }

    public function update(Request $request){
        $book = $this->booksService->edit($request->id, $request->name, $request->authors);

        if(!$book) {
            return response()->json(false);
        }

        return response()->json(true);
    }

    public function delete(Request $request){
        $book = $this->booksService->delete($request->id);

        if(!$book) {
            return response()->json(false);
        }

        return response()->json(true);
    }
}

