<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog App')</title>
    <style>
        :root {
            color-scheme: dark;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background-color: #0f0f0f;
            color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(90deg, #b30000, #330000);
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 10px rgba(179, 0, 0, 0.35);
        }

        header h1 {
            margin: 0;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        nav a,
        nav button {
            color: #ffe6e6;
            text-decoration: none;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 8px;
            border: 1px solid transparent;
            background: rgba(255, 255, 255, 0.08);
            transition: transform 0.2s ease, background 0.3s ease, border-color 0.3s ease;
        }

        nav a:hover,
        nav button:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.35);
            transform: translateY(-1px);
        }

        nav button {
            cursor: pointer;
            border: none;
        }

        main {
            flex: 1;
            width: min(960px, 94vw);
            margin: 40px auto;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            font-size: 0.9rem;
            color: #888;
        }

        .flash-message {
            margin: 0 auto 20px;
            width: min(720px, 90vw);
            padding: 14px 18px;
            border-radius: 10px;
            font-weight: 600;
            background: rgba(0, 128, 0, 0.15);
            border: 1px solid rgba(0, 200, 0, 0.5);
            color: #7fffb6;
        }
    </style>
    @stack('styles')
</head>
<body>
    <header>
        <h1>Nightfall Blog</h1>
        <nav>
            @auth
                <span>Welcome, {{ auth()->user()->name }}</span>
                <a href="{{ route('posts.index') }}">My Posts</a>
                <a href="{{ route('posts.create') }}">New Post</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
            @else
                <a href="{{ route('login') }}">Log in</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
    </header>

    @if(session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ now()->year }} Nightfall Blog. All rights reserved.
    </footer>
</body>
</html>
