<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable= [
        'name',
        'status',
        'is_featured'
    ];



    public function posts(){
        return $this->hasMany(Post::class);
    }
}
