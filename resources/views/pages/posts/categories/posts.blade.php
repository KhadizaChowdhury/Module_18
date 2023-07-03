@extends('layouts.app')

@section('body-content')
    <h1>Posts in Category: {{ $category->name }}</h1>

    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
        </div>
    @endforeach
@endsection