@extends('posts.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background: #1e1e1e;
            border: 1px solid #b30000;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(179, 0, 0, 0.5);
        }

        h1 {
            color: #ff3333;
            border-bottom: 2px solid #b30000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 6px;
            color: #ff6666;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            background: #2a2a2a;
            border: 1px solid #b30000;
            border-radius: 8px;
            color: #fff;
            font-size: 15px;
            resize: none;
        }

        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: #ff3333;
            box-shadow: 0 0 8px rgba(255, 51, 51, 0.6);
        }

        button {
            padding: 12px;
            background: #b30000;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        button:hover {
            background: #ff3333;
            transform: translateY(-2px);
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #ff3333;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
            </div>

            <div>
                <label for="body">Body:</label>
                <textarea name="body" id="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
            </div>

            <button type="submit">Update</button>
        </form>

        <a href="{{ route('posts.index') }}" class="back-link">← Back to Posts</a>
    </div>
</body>
</html>
@endsection
