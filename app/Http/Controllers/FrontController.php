<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function posts(){
        $posts = Post::with('user')->latest()->paginate(10);
        return view('welcome', compact('posts'));
    }

    public function post(Post $post){
        return view('post', compact('post'));
    }
}
