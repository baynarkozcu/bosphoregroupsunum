<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function getPost(){
        return $this->hasMany(Post::class);
    }

    public function getLikes()
    {
        return $this->hasMany(Like::class);
    }

    public function receiveAllLikes(){
        return $this->hasManyThrough(Like::class, Post::class);
    }
}
