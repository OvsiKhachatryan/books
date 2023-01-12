<?php

namespace App\Http\Controllers;
use App\Services\AuthorsService;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $authorsService;

    public function __construct(AuthorsService $authorService)
    {
        $this->authorsService = $authorService;
    }

    public function index(Request $request)
    {
        $search = $request->has('search') ? $request->search : "";
        $column = $request->has('sort_column') ? $request->sort_column : "id";
        $sort = $request->has('sort') ? $request->sort : "ASC";

        $authors = $this->authorsService->getWithSort($search, $column, $sort, 5);
        return view('author.index', compact('authors', 'search', 'column', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = $this->authorsService->create($request->name);
        return redirect()->route('author.create')->with('message', 'The author successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $author = $this->authorsService->getById($request->author);
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $author = $this->authorsService->edit($request->author, $request->name);
        return redirect()->route('author.edit', $request->author)->with('message', 'The author successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $author = $this->authorsService->delete($request->author);
        return redirect()->route('author.index')->with('message', 'The author successfully deleted');
    }
}

