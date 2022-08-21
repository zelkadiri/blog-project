<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index(){
        return Inertia::render('Welcome', [
            'posts' => PostResource::collection(Post::latest()->simplePaginate(10))
        ]);
    }
    public function show($slug){
        $post = Post::where('slug', $slug)->first();
        $post->publication_date=\Carbon\Carbon::parse($post->publication_date)->diffForHumans();
        return Inertia::render('Posts/Show', [
            'post' => $post
        ]);
    }

}
