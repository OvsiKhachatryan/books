<?php

namespace App\Http\Controllers;

use App\Services\AuthorsService;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    private $authorsService;

    public function __construct(AuthorsService $authorService)
    {
        $this->authorsService = $authorService;
    }

    public function index(Request $request){
        $search = $request->has('search') ? $request->search : "";
        $column = $request->has('sort_column') ? $request->sort_column : "id";
        $sort = $request->has('sort') ? $request->sort : "ASC";

        $authors = $this->authorsService->getWithSort($search, $column, $sort, 5);
        return view('authors', compact('authors', 'search', 'column', 'sort'));
    }

    public function addAuthors()
    {
        return view('add_authors');
    }

    public function editAuthors(Request $request)
    {
        $author = $this->authorsService->getById($request->id);
        return view('edit_authors', compact('author'));
    }

    public function create(Request $request){
        $author = $this->authorsService->create($request->name);
        if(!$author) {
            return response()->json(false);
        }
        return response()->json(true);
    }

    public function update(Request $request){
        $author = $this->authorsService->edit($request->id, $request->name);

        if(!$author) {
            return response()->json(false);
        }

        return response()->json(true);
    }

    public function delete(Request $request)
    {
        $author = $this->authorsService->delete($request->id);
        if(!$author) {
            return response()->json(false);
        }

        return response()->json(true);
    }
}
