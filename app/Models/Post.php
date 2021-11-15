<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image_path',
        'category_id'
    ];

    //each post belongs to a user 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //one post may has many likes from diffrent users
    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }


    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    //post can has many comments
    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
