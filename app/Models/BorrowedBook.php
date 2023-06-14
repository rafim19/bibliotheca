<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BorrowedBook extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'borrowed_books';
    public $timestamps = true;

    protected $fillable = ['book_id', 'user_id', 'due_date', 'is_returned'];

    public function book() {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function user() {
        return $this->hasOne(User::class, 'nim', 'user_id');
    }
}
