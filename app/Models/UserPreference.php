<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'preferred_genres',
        'excluded_genres',
        'receive_recommendations',
    ];

    protected $casts = [
        'preferred_genres' => 'array',
        'excluded_genres' => 'array',
        'receive_recommendations' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
