<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showPostCount(Request $request, $categoryId)
    {
        $postCount = Post::countByCategoryId($categoryId);

        return response()->json(['post_count' => $postCount]);
    }

    public function getPostsByCategoryId($id)
    {
        // $category = Category::findOrFail($id);
        // $posts = $category->posts;

        // return view('pages.categories.posts', compact('category', 'posts'));

        $category = DB::table( 'categories' )
        ->where( 'id', $id )
        ->first();

        if ( !$category ) {
        abort( 404 );
        }

        $posts = DB::table( 'posts' )
        ->where( 'category_id', $id )
        ->get();

        return view( 'pages.categories.posts', compact( 'category', 'posts' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
