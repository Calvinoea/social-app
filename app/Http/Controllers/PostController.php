<?php

namespace App\Http\Controllers;

use App\Post;
use Facades\App\Repository\Posts;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts',['posts' => $posts ]);
    }

    public function show(Post $slug)
    {
        return view('single-post',['post' => $slug ]);
    }

    public function getlike(Request $request)
    {
        $post = Post::find($request->post);
        return response()->json([
            'post'=>$post,
        ]);
    }

    public function like(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->like;
        $post->like = $value+1;
        $post->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }

    public function getDislike(Request $request)
    {
        $post = Post::find($request->post);
        return response()->json([
            'post'=>$post,
        ]);
    }

    public function dislike(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->dislike;
        $post->dislike = $value+1;
        $post->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }
}