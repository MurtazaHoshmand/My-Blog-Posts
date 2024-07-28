@extends('layouts.app')

@section('title', 'Form creating')

@section('content')

<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include("posts.partials.form")
    <input type="submit" value="create" class="btn btn-primary btn-block">
</form>

@endsection