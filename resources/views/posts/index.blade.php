@extends('layouts.master')

@section('title')
    All posts
@endsection

@section('content')
    <a href="{{ route('create-post') }}" class="btn btn-primary">Create new post</a>

    <hr>

    <ul>
        @foreach($posts as $post)
            <h2 class="blog-post-title"><a href="{{ route('single-post', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->body }}</p>
            @if ($post->user)
            <p>Created by {{ $post->user->name }}</p>
            @endif
            <form method="POST" action="{{route('posts-destroy', ['id' => $post->id])}}">
                {{ csrf_field() }}    
                {{-- {{ method('DELETE')}}  ili jedno ili drugo ovo dole --}}
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit">Delete</button>
            </form>
        @endforeach
    </ul>


    {{-- {{ $posts->links() }}to je za paginaciju --}}
@endsection