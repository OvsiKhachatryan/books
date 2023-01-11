<?php

namespace App\Services;

use App\Models\Authors;
use Illuminate\Database\Eloquent\Model;

class AuthorsService {
    public function create($name)
    {
        $authors = new Authors;
        $authors->name = $name;
        $authors->save();

        return $authors;
    }

    public function edit($id, $name)
    {
        $authors = Authors::find($id);
        $authors->update(['name' => $name]);

        return $authors;
    }

    public function getWithSort($search = "", $column = "id", $sort = "ASC", $pagination = 5)
    {
        $authors = Authors::with("books");

        if($search != ""){
            $authors->where('name', 'LIKE', '%' . $search . '%');
        }

        $authors->orderBy($column, $sort);

        return $authors->paginate($pagination);
    }

    public function get()
    {
        return Authors::with('books')->get();
    }

    public function getById($id)
    {
        return Authors::with('books')->find($id);
    }

    public function delete($id)
    {
        return Authors::find($id)->delete();
    }
}

