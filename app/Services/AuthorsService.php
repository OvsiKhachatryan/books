<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;

class AuthorsService {
    public function create($name)
    {
        $authors = new Author;
        $authors->name = $name;
        $authors->save();

        return $authors;
    }

    public function edit($id, $name)
    {
        $authors = Author::find($id);
        $authors->update(['name' => $name]);

        return $authors;
    }

    public function getWithSort($search = "", $column = "id", $sort = "ASC", $pagination = 5)
    {
        $authors = Author::with("books");

        if($search != ""){
            $authors->where('name', 'LIKE', '%' . $search . '%');
        }

        $authors->orderBy($column, $sort);

        return $authors->paginate($pagination);
    }

    public function get()
    {
        return Author::with('books')->get();
    }

    public function getById($id)
    {
        return Author::with('books')->find($id);
    }

    public function delete($id)
    {
        return Author::find($id)->delete();
    }
}

