<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag) {

        $posts = $tag->posts-paginate(15);   ////morali smo da dodamo paginaciju, jer smo je prethodno imali, pa da nam ne bi izbacivala gresku

        return view('posts.index', compact('posts'));
    }
}
