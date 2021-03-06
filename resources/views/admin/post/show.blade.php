
@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
            <li class="breadcrumb-item active">Post details</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Post details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Status</td>
                                    <td>{{$post->status}}</td>
                                </tr>
                                <tr>
                                    <td>Is featured</td>
                                    <td>{{$post->is_featured==1?'Yes':'No'}}</td>
                                </tr>
                                <tr>
                                    <td>Is featured</td>
                                    <td>{{$post->is_editors_pick==1?'Yes':'No'}}</td>
                                </tr>
                                <tr>
                                    <td>Is featured</td>
                                    <td>{{$post->is_trending==1?'Yes':'No'}}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{$post->category->name}}</td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td>{{$post->author->name}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-9">
                            <h1>{{$post->title}}</h1>
                            <img src="{{asset($post->photo)}}" alt="" width="100%">
                            <p>{{$post->details}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection
