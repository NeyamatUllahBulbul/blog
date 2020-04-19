<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'category_id',
        'author_id',
        'title',
        'details',
        'photo',
        'is_featured',
        'is_editors_pick',
        'is_trending',
        'status',
        'total_read'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public static function popular(){
        return Post::with('author','category')
            ->where('status','Published')
            ->orderBy('total_read','DESC')
            ->limit(4)->get();
    }
}
