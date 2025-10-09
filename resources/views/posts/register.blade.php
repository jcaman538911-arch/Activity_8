@extends('posts.layout')

@section('title', 'Register')

@push('styles')
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .register-wrapper {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: #1e1e1e;
            border: 1px solid #b30000;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(179, 0, 0, 0.5);
        }

        h2 {
            color: #ff3333;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #ff6666;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            background: #2a2a2a;
            border: 1px solid #b30000;
            border-radius: 8px;
            color: #fff;
            margin-bottom: 15px;
        }

        input:focus {
            outline: none;
            border-color: #ff3333;
            box-shadow: 0 0 8px rgba(255, 51, 51, 0.6);
        }

        button {
            width: 100%;
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

        .back {
            text-align: center;
            margin-top: 15px;
        }

        .back a {
            color: #ff3333;
            text-decoration: none;
            font-weight: bold;
        }

        .back a:hover {
            text-decoration: underline;
        }

        .error-list {
            background: rgba(179, 0, 0, 0.2);
            border-left: 4px solid #ff3333;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .error-list li {
            margin: 4px 0;
        }
    </style>
@endpush

@section('content')
    <div class="register-wrapper">
        <h2>Register</h2>

        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('posts.register.submit') }}" method="POST">
            @csrf

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Register</button>
        </form>

        <div class="back">
            <a href="{{ route('posts.index') }}">← Back to Posts</a>
        </div>
    </div>
@endsection
