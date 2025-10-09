@extends('posts.layout')

@section('title', 'All Posts')

@push('styles')
    <style>
        .posts-container {
            padding: 32px;
            background: rgba(30, 30, 30, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.35);
        }

        h1 {
            color: #ff6666;
            margin: 0 0 24px;
            letter-spacing: 0.5px;
        }

        .create-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #ff3333, #b30000);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: transform 0.2s ease, filter 0.2s ease;
        }

        .create-btn:hover {
            transform: translateY(-2px);
            filter: brightness(1.1);
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            background: rgba(255, 255, 255, 0.04);
            margin-bottom: 14px;
            padding: 18px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid transparent;
            transition: border-color 0.3s ease;
        }

        li a {
            color: #ff8080;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        li a:hover {
            text-decoration: underline;
        }

        li:hover {
            border-color: rgba(255, 128, 128, 0.3);
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions a,
        .actions button {
            padding: 6px 12px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(255, 255, 255, 0.04);
            color: #ff9999;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s, color 0.3s;
            cursor: pointer;
        }

        .actions button {
            border: none;
            background: linear-gradient(135deg, #ff3333, #b30000);
            color: #fff;
        }

        .actions a:hover,
        .actions button:hover {
            background: rgba(255, 128, 128, 0.18);
            color: #fff;
        }

        .empty-state {
            text-align: center;
            padding: 32px 16px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px dashed rgba(255, 255, 255, 0.12);
            color: #bbb;
        }

        .empty-state strong {
            color: #ff8080;
        }
    </style>
@endpush

@section('content')
    <div class="posts-container">
        <h1>All Posts</h1>
        <a href="{{ route('posts.create') }}" class="create-btn">+ Create New Post</a>

        <ul>
            @forelse($posts as $post)
                <li>
                    <div>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    <div class="actions">
                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="empty-state">
                    <strong>No posts yet.</strong>
                    <div>Share your first story by clicking “+ Create New Post”.</div>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
