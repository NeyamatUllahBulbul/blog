<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']="Create new author";
        $data['authors']=Author::paginate(2);
        $data['serial']=managePaginationSerial($data['authors']);
        return view('admin.author.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['title']="Create new author";
       return view('admin.author.create',$data);
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
            'name'=>'required',
            'email'=>'required|email|unique:authors',
            'phone'=>'required|unique:authors',
            'address'=>'required',
        ]);
        $data=$request->all();
        if ($request->photo){
            $data['photo']=$this->fileUpload($request->photo);
        }
        Author::create($data);
        session()->flash('message','Author created successfully');
        return redirect()->route('author.index');
    }

    private function fileUpload($img){
        $path='images/authors';
        $img->move($path,$img->getClientOriginalName());
        $fullpath=$path.'/'.$img->getClientOriginalName();
        return $fullpath;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $data['title']="Author details";
        $data['author']=$author;
        return view('admin.author.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $data['title']="Edit author";
        $data['author']=$author;
        return view('admin.author.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:authors,email,'.$author->id,
            'phone'=>'required|unique:authors,phone,'.$author->id,
            'address'=>'required',
        ]);
        $data=$request->all();
//        if($request->photo) {
//            $path = 'images/authors';
//            $img = $request->photo;
//            $img->move($path, $img->getClientOriginalName());
//            $data['photo']=$path.'/'.$img->getClientOriginalName();
//        }
        if ($request->photo){
            $data['photo']=$this->fileUpload($request->photo);
            if ($author->photo && file_exists($author->photo)){
                unlink($author->photo);
            }
        }
        $author->update($data);
        session()->flash('message','Author updated successfully');
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if ($author->photo && file_exists($author->photo)){
            unlink($author->photo);
        }
        $author->delete();
        session()->flash('message','Author deleted successfully');
        return redirect()->route('author.index');
    }
}
