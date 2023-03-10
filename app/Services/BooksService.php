<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class BooksService {
    public function create($name, $authors)
    {
        $book = new Book;
        $book->name = $name;
        $book->save();
        $book->authors()->sync($authors);

        return $book;
    }

    public function edit($id, $name, $authors)
    {
        $book = Book::find($id);
        $book->update(['name' => $name]);
        $book->authors()->sync($authors);
        return $book;
    }

    public function getById($id){
        return Book::with('authors')->find($id);
    }

    public function get($search = "", $column = "id", $sort = "ASC", $pagination = 5){
        $book = Book::with("authors");

        if($search != ""){
            $book->where('name', 'LIKE', '%' . $search . '%');
        }

        $book->orderBy($column, $sort);

        return $book->paginate($pagination);
    }

    public function delete($id)
    {
        return Book::find($id)->delete();
    }
}

