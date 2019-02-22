<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Tag;


class PostsController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'store']]);
    }

    public function index()
    {
        $posts = Post::with('user')->paginate(10);       ///////ovako smo optimizovali pozive
        return view('posts.index', compact(['posts']));
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        return view('posts.show', compact(['post']));
    }

    public function create()
    {
        $tags=Tag::all();

        return view('posts.create', compact('tags'));
    }

    public function store()
    {
        $this->validate(request(), [
        'title' => 'required',
        'body' => 'required',
        'tags' => 'required|array']    );
        
        $post = Post::create(
            array_merge(
                request()->only('title', 'body'),
                ['user_id' => auth()->user()->id]
            )
        );
        
        $post->tags()->attach(request('tags'));

        return redirect()->route('all-posts');
    }

    public function destroy($id){
       $post = Post::findOrfail($id);
       $post->delete();
       return redirect()->back();
    }

}
