<!-- latest_posts.blade.php -->

@extends('layouts.app')

@section('body-content')

    <div class="block-heading p-5">
        <h2 class="">Latest Posts for Each Category</h2>
    </div>
    <div class="row p-2 justify-content-center category-posts">
        @foreach($categories as $category)
        
        @if($category->title)
        
            <div class="col-sm-6 col-lg-4 post">
                
                <div class="card text-center clean-card">
                    <div class="card-body info">
                        <h2>{{ $category->category_name }}</h2>
                        <h4 class="card-title">{{ $category->title }}</h4>
                        <p class="card-text">{{ $category->description }}</p>
                        <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                    </div>
                </div>
            </div>
        @else
                <p>No posts available for this category.</p>
            @endif
        @endforeach
    </div>
@endsection
