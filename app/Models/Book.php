<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function authors(){
        return $this->belongsToMany(Author::class, 'book_authors', 'book_id', 'author_id');
    }
}
