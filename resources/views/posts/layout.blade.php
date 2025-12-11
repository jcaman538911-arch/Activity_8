<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog App')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600&display=swap');

        :root {
            --bg-primary: #0b1223;
            --bg-muted: #101a33;
            --bg-accent: #142040;
            --card: rgba(12, 18, 33, 0.75);
            --text-primary: #f4f6ff;
            --text-muted: #9eaad7;
            --accent-1: #ff8a65;
            --accent-2: #71e3ff;
            --accent-3: #ffd366;
            color-scheme: dark;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: radial-gradient(circle at 20% 20%, rgba(113, 227, 255, 0.18), transparent 55%),
                radial-gradient(circle at 80% 0%, rgba(255, 138, 101, 0.2), transparent 45%), var(--bg-primary);
            color: var(--text-primary);
            font-family: 'Space Grotesk', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: radial-gradient(circle at top right, rgba(255, 211, 102, 0.35), transparent 55%),
                linear-gradient(120deg, #0f1c3f, #1b1b4d 60%, #0f1c3f);
            padding: 24px clamp(20px, 6vw, 48px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            box-shadow: 0 20px 60px rgba(5, 6, 23, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        header h1 {
            margin: 0;
            font-size: clamp(1.4rem, 4vw, 2rem);
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
        }

        nav a,
        nav button {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 600;
            padding: 10px 18px;
            border-radius: 999px;
            border: 1px solid transparent;
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(6px);
            transition: transform 0.2s ease, background 0.3s ease, border-color 0.3s ease, color 0.3s ease;
        }

        nav a:hover,
        nav button:hover {
            background: rgba(255, 255, 255, 0.16);
            border-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-1px) scale(1.01);
            color: var(--accent-2);
        }

        nav button {
            cursor: pointer;
            border: none;
        }

        main {
            flex: 1;
            width: min(1024px, 94vw);
            margin: clamp(32px, 5vw, 64px) auto;
        }

        footer {
            text-align: center;
            padding: 28px 0 36px;
            font-size: 0.95rem;
            color: var(--text-muted);
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .flash-message {
            margin: 0 auto 24px;
            width: min(720px, 90vw);
            padding: 16px 20px;
            border-radius: 14px;
            font-weight: 600;
            background: linear-gradient(120deg, rgba(113, 227, 255, 0.15), rgba(255, 138, 101, 0.15));
            border: 1px solid rgba(113, 227, 255, 0.4);
            color: var(--accent-2);
            box-shadow: 0 20px 50px rgba(8, 9, 20, 0.4);
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
