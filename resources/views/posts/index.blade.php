@extends('posts.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Posts</title>
    <style>
        body {
            background-color: #121212; /* black background */
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background: #1e1e1e; /* dark card background */
            border: 1px solid #b30000;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(179, 0, 0, 0.5);
        }

        h1 {
            color: #ff3333;
            border-bottom: 2px solid #b30000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .create-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 18px;
            background: #b30000;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s, transform 0.2s;
        }

        .create-btn:hover {
            background: #ff3333;
            transform: translateY(-2px);
        }

        .success-msg {
            color: #00ff99;
            margin-bottom: 15px;
            font-weight: bold;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background: #2a2a2a;
            margin-bottom: 12px;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        li a {
            color: #ff3333;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        li a:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions a {
            color: #b30000;
            text-decoration: none;
            padding: 6px 12px;
            border: 1px solid #b30000;
            border-radius: 6px;
            transition: background 0.3s, color 0.3s;
        }

        .actions a:hover {
            background: #ff3333;
            color: #fff;
        }

        .actions button {
            padding: 6px 12px;
            background: #b30000;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .actions button:hover {
            background: #ff3333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Posts</h1>
        <a href="{{ route('posts.create') }}" class="create-btn">+ Create New Post</a>

        @if(session('success'))
            <p class="success-msg">{{ session('success') }}</p>
        @endif

        <ul>
            @foreach($posts as $post)
                <li>
                    <div>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </div>
                    <div class="actions">
                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
@endsection
