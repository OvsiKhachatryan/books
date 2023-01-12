<?php

namespace App\Http\Controllers;

use App\Services\AuthorsService;
use App\Services\BooksService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $booksService;
    private $authorsService;

    public function __construct(BooksService $booksService, AuthorsService $authorsService)
    {
        $this->booksService = $booksService;
        $this->authorsService = $authorsService;
    }

    public function index(Request $request)
    {
        $search = $request->has('search') ? $request->search : "";
        $column = $request->has('sort_column') ? $request->sort_column : "id";
        $sort = $request->has('sort') ? $request->sort : "ASC";
        $book = $this->booksService->get($search, $column, $sort, 5);
        return view('book.index', compact('book', 'search', 'column', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = $this->authorsService->get();
        return view('book.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = $this->booksService->create($request->name, $request->authors);
        return redirect()->route('book.create')->with('message', 'The book successfully added');
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
        $authors = $this->authorsService->get();
        $book = $this->booksService->getById($request->book);
        return view('book.edit', compact('authors', 'book'));
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
        $book = $this->booksService->edit($request->book, $request->name, $request->authors);
        return redirect()->route('book.edit', $request->book)->with('message', 'The book successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $book = $this->booksService->delete($request->book);
        return redirect()->route('book.index')->with('message', 'The book successfully deleted');
    }

}
