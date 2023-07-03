<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = DB::table( 'posts' )
        ->join( 'categories', 'posts.category_id', '=', 'categories.id' )
        ->select( 'posts.*', 'categories.name as category_name' )
        ->get();

        return view( 'pages.posts.index', compact( 'posts' ) );
    }

    public function showLatestPost()
    {
        $category = DB::table( 'categories' )
            ->where( 'id', 1 ) // Replace 1 with the desired category ID
            ->first();

        if ( $category ) {
            $latestPost = DB::table( 'posts' )
                ->where( 'category_id', $category->id )
                ->orderBy( 'created_at', 'desc' )
                ->first();
        } else {
            // Handle category not found
            $latestPost = "Not Found";
        }

        return view('pages.posts.showLatestPost', compact('latestPost'));
    }

    public function showLatestPostCat()
    {
        $categories = DB::table( 'categories' )
        ->join( 'posts', 'categories.id', '=', 'posts.category_id' )
        ->select( 'categories.name as category_name', 'posts.title', 'posts.description' )
        ->orderBy( 'posts.created_at', 'desc' )
        ->get();

        return view('pages.posts.showLatestPostsCat', compact('categories'));
    }


    public function showSoftDeletedPosts()
    {
        $softDeletedPosts = Post::getSoftDeletedPosts();

        return response()->json( ['soft_deleted_posts' => $softDeletedPosts] );
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(string $id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('pages.posts.index')->with('success', 'Post deleted successfully.');
        }

        return redirect()->route('pages.posts.index')->with('error', 'Post not found.');
    }

}
