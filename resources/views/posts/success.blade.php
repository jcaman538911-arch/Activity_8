@extends('posts.layout')

@section('title', 'Registration Successful')

@push('styles')
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .success-card {
            max-width: 600px;
            margin: 50px auto;
            background: #1e1e1e;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #b30000;
            box-shadow: 0 0 15px rgba(179, 0, 0, 0.5);
        }

        h2 {
            color: #ff3333;
            text-align: center;
            margin-bottom: 20px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #ff3333;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
@endpush

@section('content')
    <div class="success-card">
        <h2>🎉 Registration Successful!</h2>

        <p><strong>Name:</strong> {{ $user['name'] }}</p>
        <p><strong>Email:</strong> {{ $user['email'] }}</p>

        <div style="text-align:center;">
            <a href="{{ route('posts.register') }}" class="back-link">← Back to Register</a>
        </div>
    </div>
@endsection
