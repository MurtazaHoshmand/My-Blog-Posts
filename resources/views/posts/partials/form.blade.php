<div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" class="form-control" name='title' placeholder="user name" value="{{old('title', optional($post ?? null)->title)}}"><br>
</div>
    @error('title')
        {{$message}}
    @enderror
<div class="form-group">
    <label for="content">Content</label>
    <textarea id='content' class="form-control" name="content" id="content" cols="30" rows="10">
        {{old('content', optional($post ?? null)->content)}}
    </textarea><br>

</div>

<div class="form-group">
    <label for="thumbnail">Thumbnail</label>
    <input type="file" id="thumbnail" name="thumbnail"  class="form-control-file">
</div>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif