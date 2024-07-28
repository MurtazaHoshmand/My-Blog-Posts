<div class="mb-2 mt-2">
    @auth
        <form action="{{route('posts.comments.store', ['post' => $post->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control" cols="10" rows="2"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add comment</button>
        </form>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @else
        <a href="{{route('auth.login')}}">Sign-in</a> to post comments!
    @endauth

</div>
<hr>
