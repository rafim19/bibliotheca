<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    public $timestamps = true;

    protected $fillable = ['title', 'description', 'is_read', 'user_id'];

    public function user() {
        return $this->hasOne(User::class, 'user_id', 'nim');
    }
}
