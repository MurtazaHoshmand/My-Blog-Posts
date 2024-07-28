@extends("layouts.app")

@section('title', $post['title'])
@section('content')
    <div class="col-8" style="max-width: 800px; margin-left: 200px">
        @if ($post->image)
            <div style="background-image: url('{{$post->image->url()}}'); background-size: cover; min-height: 500px; color: white; text-align: center; background-attachment: fixed;">
                <h1 style="padding-top: 100px; text-shadow: 1px 2px #00; color: orange">
        @else
            <h1>
        @endif
        {{$post['title']}}</h1>

        @if ($post->image)
            </h1>
        </div>
        @else
        </h1>
        @endif
        <p style="margin-top: 20px">{{$post['content']}}</p>

        <p>
            Added {{$post->created_at->diffForHumans()}}
            by {{$post->user->name}}
        </p>

        <h4 class="mt-8">Comments</h4>
        @include('comments._form')

        @forelse ($post->comments as $comment)
            <p class="mb-0" style="font-size: 22px">
                {{$comment->content}}
            </p>
            <p class="mt-0 text-success">
                added {{$comment->created_at->diffForHumans()}}
                by {{$comment->user->name}}
            </p>
        @empty
            <p>No comments yet!</p>
        @endforelse
</div>
@endsection
