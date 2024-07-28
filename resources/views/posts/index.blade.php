@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8">
        @forelse($posts as $post)
            @include('posts.partials.post')

            @empty
            <div>No post exist</div>
        @endforelse
    </div>

    <div class="col-4">
        <div class="container">
            <div class="row">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Most Commented</h5>
                        <p class="card-subtitle mb-2 text-muted">What people are currently talking about</p>
                    </div>
                    <ul class="list-group list-group-flash">
                        @foreach ($mostCommented as $post)
                            <li class="list-group-item text-xs">
                                <a href="{{route('posts.show', ['post'=>$post->id])}}" class="  text-decoration-none">
                                    {{$post->content}}                        
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Most Active Users</h5>
                        <p class="card-subtitle mb-2 text-muted">Users with most posts written</p>
                    </div>
                    <ul class="list-group list-group-flash">
                        @foreach ($mostActive as $user)
                            <li class="list-group-item text-xs">
                                {{$user->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row mt-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">Most Active Last Month</h5>
                        <p class="card-subtitle mb-2 text-muted">Users with most posts written</p>
                    </div>
                    <ul class="list-group list-group-flash">
                        @foreach ($mostActiveLastMonth as $user)
                            <li class="list-group-item text-xs">
                                {{$user->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection