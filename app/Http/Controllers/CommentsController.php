<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;                   //ovo moramo imati zbog instance posta
use App\Comment;
use App\Mail\CommentReceived;

class CommentsController extends Controller
{
    public function store($postId)
    {
        $post = Post::find($postId);

        $this->validate(request(), Comment::STORE_RULES);

        $comment = $post->comments()->create(request()->all());   //ovo smo usignovali  moglo je i $comment = COmment::create();

        if ($post->user) {
            \Mail::to($post->user)->send(new CommentReceived( $post, $comment    //jer postoje postovi koji nemaju korisnike
            
        ));
        }

        

        return redirect()->route('single-post', ['id' => $postId]);
    }
}
