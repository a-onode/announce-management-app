<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'announce_id',
        'text',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function announces()
    {
        return $this->belongsTo(Announce::class);
    }
}
