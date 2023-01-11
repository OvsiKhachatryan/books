<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function books(){
        return $this->belongsToMany(Books::class, 'book_authors', 'author_id', 'book_id');
    }
}
