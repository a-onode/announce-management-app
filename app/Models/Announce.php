<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'text',
        'file_path',
        'url',
        'status',
        'is_visible',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
}
