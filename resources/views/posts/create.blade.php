@extends('posts.layout')

@section('title', 'Create New Post')

@push('styles')
    <style>
        .post-form-wrapper {
            max-width: 720px;
            margin: 0 auto;
            padding: clamp(26px, 4vw, 36px);
            background: linear-gradient(135deg, rgba(11, 17, 34, 0.9), rgba(20, 29, 58, 0.92));
            border: 1px solid rgba(113, 227, 255, 0.25);
            border-radius: 28px;
            box-shadow: 0 30px 80px rgba(5, 6, 23, 0.65);
        }

        h2 {
            color: var(--accent-2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 14px;
            margin-bottom: 24px;
            text-align: center;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
            color: var(--text-muted);
            letter-spacing: 0.05em;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 16px;
            background: rgba(7, 11, 24, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            color: var(--text-primary);
            font-size: 1rem;
            resize: none;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: rgba(113, 227, 255, 0.65);
            box-shadow: 0 0 0 4px rgba(113, 227, 255, 0.15);
        }

        button {
            padding: 14px;
            background: linear-gradient(120deg, #71e3ff, #ffd366);
            color: #0a1223;
            font-weight: 700;
            border: none;
            border-radius: 999px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.3s;
            box-shadow: 0 18px 40px rgba(113, 227, 255, 0.35);
        }

        button:hover {
            transform: translateY(-2px) scale(1.01);
            box-shadow: 0 25px 55px rgba(113, 227, 255, 0.45);
        }

        .back-link {
            display: inline-flex;
            margin-top: 18px;
            text-decoration: none;
            color: var(--accent-2);
            font-weight: 600;
            align-items: center;
            gap: 6px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .error-list {
            background: rgba(255, 138, 101, 0.12);
            border-left: 4px solid var(--accent-1);
            padding: 12px 18px;
            border-radius: 16px;
            margin-bottom: 18px;
        }

        .error-list li {
            margin: 4px 0;
        }
    </style>
@endpush

@section('content')
    <div class="post-form-wrapper">
        <h2>Create New Post</h2>

        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div>
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="5" required>{{ old('body') }}</textarea>
            </div>

            <button type="submit">Save</button>
        </form>

        <a href="{{ route('posts.index') }}" class="back-link">← Back to Posts</a>
    </div>
@endsection
