<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name',
        'icon',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
