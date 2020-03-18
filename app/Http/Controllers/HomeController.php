<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['editors_pick']=Post::with('author','category')->where('is_editors_pick',1)
            ->where('status','Published')
            ->limit(6)->get();
        $data['trending']=Post::with('author','category')->where('is_trending',1)
            ->where('status','Published')
            ->limit(4)->get();
        return view('front.index',$data);
    }
}
