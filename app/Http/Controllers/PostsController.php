<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\blogPost;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Models\Image;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostsController extends Controller
{
    /** 
     * Display a listing of the resource.
     */

     use AuthorizesRequests;
    public function __construct()
        {
            $this->middleware('auth')->only(['index','edit', 'update','store','show','destroy']);
        }
    public function index()
    {   
        return view(
            'posts.index',
            [
            'posts' => blogPost::withCount('comments')->get(),
            'mostCommented' =>blogPost::mostCommented()->take(5)->get(),
            'mostActive'=> User::WithMostBlogPosts()->take(5)->get(),
            'mostActiveLastMonth'=> User::WithMostBlogPostsLastMonth()->take(5)->get()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePost $request)
    {   
        $validated = $request->validated();
        // $validated->user_id = $request->session()->get('loginId');
        $validated['user_id'] = auth()->user()->id;
        $post = new blogPost();
        $post = blogPost::create($validated);

        if( $request->hasFile('thumbnail')){
            $path = $request->file('thumbnail')->store('thumbnails','public');
            $post->image()->save(
                Image::create(['path' => $path, 'blog_post_id' => $post->id])
            );
        }
        // $request->session()->flash('status', 'Post has been added');
        return redirect()->route('posts.show', ['post'=> $post->id ])->with('status', 'Post has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // abort_if(!isset($this->posts[$id]), 404);
        return view('posts.show', ['post'=> blogPost::with('comments')->findOrFail($id)]);
    }

    /**
     * Show  the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $post = blogPost::findOrFail($id);
        $this->authorize($post);
        return view('posts.edit', ['post'=> $post]);
        // if (Gate::allows('update', $post)) {
        //     return view('posts.edit', ['post'=>$post]);
        // } else {
        //     abort(403, 'Unauthorized action.');
        // }
        // $post = blogPost::findOrFail($id);
        // if(Gate::denies('update-post', $post)){
        //     abort(403, "You can not edit this post!");
        // }
        // return view('posts.edit', ['post'=>$post]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePost $request, string $id)
    {
        $post = blogPost::findOrFail($id);
        $this->authorize($post);
        $validated = $request->validated();
        $post->fill($validated);

        if( $request->hasFile('thumbnail')){
            $path = $request->file('thumbnail')->store('thumbnails','public');
            if($post->image){
                Storage::delete($post->image->path);
                $post->image->path = $path;
                $post->image->save();
            }else{
                $post->image()->save(
                    Image::create(['path' => $path, 'blog_post_id' => $post->id])
                );

            }
        }
        $post->save();
        return redirect()->route('posts.show', ['post'=> $post->id]);

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = blogPost::findOrFail($id);
        $this->authorize($post);
        $post->delete();
        session()->flash('status','blog post was deleted');
        return redirect()->route('posts.index', ['post'=> $post->id ]);
    }
}
