<!-- resources/views/posts.blade.php -->

@extends('layouts.app')

@section('body-content')
    <h1>Latest Post</h1>

        <div class="post">
            <h2>{{ $latestPost->title }}</h2>
            <p>{{ $latestPost->description }}</p>
        </div>
@endsection
