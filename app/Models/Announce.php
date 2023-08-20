<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'text',
        'file1',
        'file2',
        'url',
        'authority',
        'type',
        'is_visible',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
}
