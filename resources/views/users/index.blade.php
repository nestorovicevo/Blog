@extends('layouts.master')

@section('title')
My posts
@endsection

@section('content')
 My posts
    <a href="{{ route('create-post') }}" class="btn btn-primary">Create post</a>

    <hr>

    <ul>
        @foreach($user->posts as $post)
            <h2 class="blog-post-title"><a href="{{ route('single-post', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->body }}</p>
            @if ($post->user)
            <p>Created by <a href="#">{{ $post->user->name }}</a></p>
            @endif
        @endforeach
    </ul>
@endsection