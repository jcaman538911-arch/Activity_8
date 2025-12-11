@extends('posts.layout')

@section('title', 'All Posts')

@push('styles')
    <style>
        .posts-container {
            padding: clamp(28px, 4vw, 40px);
            background: linear-gradient(135deg, rgba(16, 26, 51, 0.95), rgba(11, 18, 35, 0.85));
            border: 1px solid rgba(113, 227, 255, 0.2);
            border-radius: 28px;
            box-shadow: 0 25px 80px rgba(2, 5, 16, 0.7);
            position: relative;
            overflow: hidden;
        }

        .posts-container::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 85% -10%, rgba(113, 227, 255, 0.18), transparent 35%),
                radial-gradient(circle at 10% 110%, rgba(255, 138, 101, 0.22), transparent 38%);
            pointer-events: none;
            opacity: 0.7;
        }

        h1 {
            color: var(--accent-2);
            margin: 0 0 24px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .create-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 28px;
            padding: 13px 22px;
            background: linear-gradient(120deg, #ff8a65, #ffd366);
            color: #0a1223;
            text-decoration: none;
            border-radius: 999px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: transform 0.2s ease, filter 0.2s ease;
            box-shadow: 0 15px 40px rgba(255, 138, 101, 0.35);
        }

        .create-btn:hover {
            transform: translateY(-2px) scale(1.01);
            filter: brightness(1.05);
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        li {
            background: rgba(7, 11, 24, 0.85);
            margin-bottom: 14px;
            padding: 22px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.04);
            transition: border-color 0.3s ease, transform 0.2s ease;
        }

        li:hover {
            border-color: rgba(113, 227, 255, 0.4);
            transform: translateY(-2px);
        }

        li a {
            color: var(--accent-2);
            text-decoration: none;
            font-weight: 600;
            margin-right: 10px;
            font-size: 1rem;
        }

        li a:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions a,
        .actions button {
            padding: 8px 14px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(255, 255, 255, 0.04);
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s, color 0.3s, border-color 0.3s;
            cursor: pointer;
        }

        .actions button {
            border: 1px solid rgba(255, 138, 101, 0.5);
            background: rgba(255, 138, 101, 0.15);
            color: var(--accent-1);
        }

        .actions a:hover,
        .actions button:hover {
            background: rgba(113, 227, 255, 0.15);
            border-color: rgba(113, 227, 255, 0.35);
            color: var(--accent-2);
        }

        .empty-state {
            text-align: center;
            padding: 36px 16px;
            border-radius: 20px;
            background: rgba(7, 11, 24, 0.8);
            border: 1px dashed rgba(255, 255, 255, 0.18);
            color: var(--text-muted);
        }

        .empty-state strong {
            color: var(--accent-2);
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
