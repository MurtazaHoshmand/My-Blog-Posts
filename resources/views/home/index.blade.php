@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="container text-center py-5" style="background-image: url('{{Storage::url('thumbnails/-5994600466685737004_121.jpg')}}'); background-size: cover;min-height: 400px; background-position: center; color: white;">
    <h1 class="display-4" style="color: rgb(31, 229, 209); font-weight: bold;">Welcome to Our Home Page</h1>
    <p class="lead mt-4" style="color: yellow;">Discover amazing content and connect with our community.</p>
    <a href="{{ route('posts.index') }}" class="btn btn-success btn-lg" style="margin-top: 50px">View Posts</a>

</div>
<p style="color: rgb(77, 229, 31); ">Murtaza Hoshmand</p>

@endsection
