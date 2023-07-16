<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'announce_id',
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
