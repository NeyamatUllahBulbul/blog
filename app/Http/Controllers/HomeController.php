<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['editors_pick']=Post::with('author','category')
            ->where('is_editors_pick',1)
            ->where('status','Published')
            ->limit(6)->get();

        $data['trending']=Post::with('author','category')
            ->where('is_trending',1)
            ->where('status','Published')
            ->limit(4)->get();

        $data['featured_categories']=Category::with(['posts'=>function($query){
            $query->with('category','author')->orderBy('id','DESC');
        }])
            ->where('is_featured',1)
            ->limit(2)->get();

        $data['recent_posts']=Post::with('author','category')
            ->where('status','Published')
            ->orderBy('id','DESC')
            ->limit(3)->get();

        $data['popular_posts']=Post::with('author','category')
            ->where('status','Published')
            ->orderBy('total_read','DESC')
            ->limit(4)->get();
        return view('front.index',$data);
    }
}
