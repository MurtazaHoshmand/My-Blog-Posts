@extends('layouts.app')

@section('title', 'Form Updating')

@section('content')


<form action="{{route('posts.update', ['post'=>$post->id])}}"
     method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include("posts.partials.form")
    <input type="submit" value="update" class="btn btn-primary btn-block">
</form>


@endsection