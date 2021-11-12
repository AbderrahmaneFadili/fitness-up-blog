<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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
}
