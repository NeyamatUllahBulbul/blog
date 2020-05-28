<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($id){
        $data['post']=Post::findOrFail($id)->increment('total_read');
        $data['post']=Post::with('category','author')->findOrFail($id);
        $data['popular_posts']= Post::popular();
        $data['comments']=Comment::where('post_id',$id)->get();
//        dd($data['comments']);
        return view('front.blog.show',$data);
    }
}
