@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('author.index')}}">author</a></li>
            <li class="breadcrumb-item active">author list</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">author list</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">Sl No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Total post</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$author->name}}</td>
                                <td>{{$author->email}}</td>
                                <td>{{$author->phone}}</td>
                                <td>{{$author->status}}</td>
                                <td>{{$author->total_post}}</td>
                                <td>
                                    <a href="{{route('author.edit',$author->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('author.show',$author->id)}}" class="btn btn-primary">Show Profile</a>
                                    <form action="{{route('author.destroy',$author->id)}}" method="post">
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
                {{$authors->render()}}
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection
