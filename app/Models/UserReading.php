<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReading extends Model
{
    protected $fillable = ['user_id', 'book_title', 'genre', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
