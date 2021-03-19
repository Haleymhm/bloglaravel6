<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => 1,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'iframe' => $request->input('iframe'),
            'status' => 0,
        ]);

        if($request->file('file')){
            $post->image = $request->file('file')->store('posts','public');
            $post->save();
        }
        return redirect('/posts')->with('status','Post creado con exito.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post = Post::update([
            /*'user_id' => auth()->user()->id,
            'category_id' => 1,*/
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'iframe' => $request->input('iframe'),
            'status' => 0,
        ]);


        // si viene con file
        if ($request->file('image')) {
            Storage::disk('public')->delete($post->image);
            $post->image = $request->file('image')->store('posts', 'public');
            $post->save();
        }
        
        return redirect('/posts')->with('status','Post actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Eliminación de una imagen
        Storage::disk('public')->delete($post->image);
        //Eliminar un post usando delete
        $post->delete();
        // Creamos una redirección a la vista inicando un mensaje.
        return redirect('/posts')->with('status','Post creado con exito.');
    }
}
