<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function authors(){
        return $this->belongsToMany(Authors::class, 'book_authors', 'book_id', 'author_id');
    }
}
