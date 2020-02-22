@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('author.index')}}">Authors</a></li>
            <li class="breadcrumb-item active">Author details</li>
        </ol>
    </div>
@endsection
@section('content')

@endsection
