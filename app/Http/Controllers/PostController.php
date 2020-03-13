<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='All posts';
        $data['posts']=Post::orderBy('id','DESC')->paginate(10);
        $data['serial']=managePaginationSerial($data['posts']);
        return view('admin.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Create new post';
        $data['categories']=Category::where('status','Active')->orderBy('name','ASC')->pluck('name','id');
        $data['authors']=Author::where('status','Active')->orderBy('name','ASC')->pluck('name','id');
        return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'author_id'=>'required',
            'title'=>'required',
            'details'=>'required',
            'photo'=>'mimes:jpeg,bmp,png'
        ]);
        $data=$request->all();
        $data['photo']=$this->fileUpload($request->photo);
        Post::create($data);
        session()->flash('message','Post created successfully');
        return redirect()->route('post.index');
    }

    private function fileUpload($img){
        $path='images/posts';
        $file_name=time().rand('00000','99999').'.'.$img->getClientOriginalExtension();
        $img->move($path,$file_name);
        $full_path=$path.'/'.$file_name;
        return $full_path;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data['title']='Post Details';
        $data['post'] = $post->with('category','author')->get();
//        dd($data);
        return view('admin.post.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['title']='Edit Post';
        $data['categories']=Category::where('status','Active')->orderBy('name','ASC')->pluck('name','id');
        $data['authors']=Author::where('status','Active')->orderBy('name','ASC')->pluck('name','id');
        $data['post']=$post;
        return view('admin.post.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id'=>'required',
            'author_id'=>'required',
            'title'=>'required',
            'details'=>'required',
            'photo'=>'mimes:jpeg,bmp,png'
        ]);
        $data=$request->all();
        $data['photo']=$this->fileUpload($request->photo);
        if (file_exists($post->photo)){
            unlink($post->photo);
        }
        $post->update($data);
        session()->flash('message','Post updated successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->photo && file_exists($post->photo)){
            unlink($post->photo);
        }
        $post->delete();
        session()->flash('message','Post deleted successfully');
        return redirect()->route('post.index');
    }
}
