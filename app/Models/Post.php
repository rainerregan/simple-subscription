<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Relationship
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }
}
