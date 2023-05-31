<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';
    public $timestamps = true;

    protected $fillable = ['title', 'author', 'description', 'category_id', 'quantity', 'isbn', 'publisher', 'release_date', 'edition', 'language'];

    public function borrowedBooks() {
        return $this->hasMany(BorrowedBook::class, 'id', 'book_id');
    }
}
