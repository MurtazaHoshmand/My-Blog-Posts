<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Models\blogPost;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function __construct(){
        $this->middleware("auth")->only(['store']);
    }
    public function store(blogPost $post, StoreComment $request){
        $post->comments()->create([
            'user_id'=> $request->user()->id,
            'content'=> $request->input('content')
        ]);
        return redirect()->back()->with('success','');
    }
}
