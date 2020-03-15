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
}
