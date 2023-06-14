<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'nim';
    public $timestamps = true;

    protected $fillable = ['nim', 'name', 'email', 'gender', 'domicile', 'phone_number', 'faculty', 'major'];

    public function borrowedBooks() {
        return $this->hasMany(BorrowedBook::class, 'user_id', 'nim');
    }

    public function notifications() {
        return $this->hasMany(Notification::class, 'nim', 'user_id');
    }
}
