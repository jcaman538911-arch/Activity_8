@extends('posts.layout')

@section('title', $post->title)

@push('styles')
    <style>
        .post-detail {
            max-width: 720px;
            margin: 0 auto;
            padding: clamp(28px, 5vw, 42px);
            background: linear-gradient(135deg, rgba(11, 17, 34, 0.9), rgba(20, 29, 58, 0.92));
            border: 1px solid rgba(113, 227, 255, 0.25);
            border-radius: 34px;
            box-shadow: 0 30px 90px rgba(5, 6, 23, 0.7);
        }

        h1 {
            color: var(--accent-2);
            margin-bottom: 18px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        p {
            line-height: 1.8;
            margin-bottom: 26px;
            color: var(--text-muted);
            font-size: 1.05rem;
        }

        .back-link {
            color: var(--accent-2);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
@endpush

@section('content')
    <div class="post-detail">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <a href="{{ route('posts.index') }}" class="back-link">← Back to Posts</a>
    </div>
@endsection
