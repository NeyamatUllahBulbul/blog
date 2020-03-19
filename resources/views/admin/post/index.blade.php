@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
            <li class="breadcrumb-item active">All posts</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Post list</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th style="width: 10px">Sl No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Is Featured</th>
                            <th>Is Editor's Pick</th>
                            <th>Is Trending</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->is_featured==1?'Yes':'No'}}</td>
                                <td>{{$post->is_editors_pick==1?'Yes':'No'}}</td>
                                <td>{{$post->is_trending==1?'Yes':'No'}}</td>
                                <td>{{$post->status}}</td>
                                <td>
                                    <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('post.show',$post->id)}}" class="btn btn-primary">Show Details</a>
                                    <form action="{{route('post.destroy',$post->id,$post->author_id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                {{$posts->render()}}
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection
