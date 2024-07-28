<h3>
        <a href="{{route('posts.show', ['post' => $post->id])}} " class="text-decoration-none text-success">{{$post->title}}</a>
</h3>

<p class="text-muted">
    Added {{$post->created_at->diffForHumans()}}
    by {{$post->user->name}}
</p>

@if($post->comments_count)
    <p>{{$post->comments_count}} comments</p>
@else
    <p>No comment yet!</p>
    
@endif

<div class="mb-4">
    
    @can('update',$post)
        <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-primary p-0 px-2">
            Edit</a>
    @endcan
    @can('delete', $post)
        <form class="d-inline" action="{{route('posts.destroy', ['post'=> $post->id])}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger p-0 px-2">
        </form>    
    @endcan
</div>  
