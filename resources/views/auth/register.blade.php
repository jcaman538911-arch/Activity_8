@extends('posts.layout')

@section('title', 'Register')

@push('styles')
    <style>
        .auth-card {
            margin: 60px auto;
            width: min(440px, 92vw);
            background: rgba(30, 30, 30, 0.95);
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.45);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .auth-card h2 {
            margin: 0 0 24px;
            text-align: center;
            color: #ff6666;
            letter-spacing: 0.5px;
        }

        .auth-card label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #ffe6e6;
        }

        .auth-card input[type="text"],
        .auth-card input[type="email"],
        .auth-card input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 18px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        .auth-card input:focus {
            outline: none;
            border-color: rgba(255, 102, 102, 0.8);
            box-shadow: 0 0 0 2px rgba(255, 102, 102, 0.3);
        }

        .auth-card button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #ff3333, #b30000);
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            transition: filter 0.2s ease;
        }

        .auth-card button:hover {
            filter: brightness(1.1);
        }

        .auth-card .alt-link {
            display: block;
            text-align: center;
            margin-top: 24px;
            color: #ff9999;
            text-decoration: none;
            font-weight: 600;
        }

        .auth-card .alt-link:hover {
            text-decoration: underline;
        }

        .error-list {
            background: rgba(255, 0, 0, 0.12);
            border-left: 4px solid rgba(255, 99, 71, 0.8);
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 18px;
        }

        .error-list li {
            margin: 4px 0;
        }
    </style>
@endpush

@section('content')
    <div class="auth-card">
        <h2>Create an account</h2>

        @if($errors->any())
            <ul class="error-list">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>

            <label for="email">Email address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Register</button>
        </form>

        <a class="alt-link" href="{{ route('login') }}">Already registered? Log in</a>
    </div>
@endsection
