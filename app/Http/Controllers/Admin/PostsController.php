<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Posts/Index', [
            'posts' => PostResource::collection(Post::latest()->where('user_id', auth()->user()->id)->simplePaginate(10))
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Admin/Posts/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', Rule::unique(Post::class)],
            'description' => ['required', 'string'],
        ]);
        $data['publication_date'] = Carbon::now();
        $data['created_at'] = Carbon::now();
        $data['user_id'] = Auth::user()->id;
        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'Post saved successfully.');
    }

    public function show($slug){

        $post = Post::where('slug', $slug)->first();
        $post->publication_date=\Carbon\Carbon::parse($post->publication_date)->diffForHumans();
        return Inertia::render('Admin/Posts/Show', [
            'post' => $post
        ]);
    }
}
