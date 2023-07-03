<!-- resources/views/posts.blade.php -->

@extends('layouts.app')

@section('body-content')
    <h1>All Posts</h1>

    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>

            <div class="categories">
                <span class="category">{{ $post->category_name }}</span>
            </div>
    @endforeach
@endsection
