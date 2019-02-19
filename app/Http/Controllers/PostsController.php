<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostsController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'store']]);
    }

    public function index()
    {
        $posts = Post::publishedPosts()->paginate(10);
        return view('posts.index', compact(['posts']));
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        return view('posts.show', compact(['post']));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), Post::STORE_RULES);
        
        $post = Post::create(
            array_merge(
                request()->all(),
                ['user_id' => auth()->user()->id]
            )
        );

        return redirect()->route('all-posts');
    }

    public function destroy($id){
       $post = Post::findOrfail($id);
       $post->delete();
       return redirect()->back();
    }
}
