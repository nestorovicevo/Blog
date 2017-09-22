<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::getPublishedPosts();
        return view('posts.index', compact(['posts']));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact(['post']));
    }
}
