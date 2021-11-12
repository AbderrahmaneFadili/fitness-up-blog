<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'post_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //one comment can has many replies
    public function replies()
    {
        return $this->hasMany(PostComment::class);
    }
}
