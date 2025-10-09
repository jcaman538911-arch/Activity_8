<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display all posts
    public function index()
    {
        $posts = Auth::user()->posts()->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Show the form for creating a new post
    public function create()
    {
        return view('posts.create');
    }

    // Show a single post
    public function show($id)
    {
        $post = $this->findUserPost($id);
        return view('posts.show', compact('post'));
    }

    // Store a newly created post in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Auth::user()->posts()->create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // Edit a post
    public function edit($id)
    {
        $post = $this->findUserPost($id);
        return view('posts.edit', compact('post'));
    }

    // Update a post
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = $this->findUserPost($id);
        $post->update($request->only(['title', 'body']));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // Delete a post
    public function destroy($id)
    {
        $post = $this->findUserPost($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    private function findUserPost(int $id): Post
    {
        return Auth::user()->posts()->whereKey($id)->firstOrFail();
    }
}
