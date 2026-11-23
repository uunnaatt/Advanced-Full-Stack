<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            margin: 0; padding: 0;
            background: #f9fafb; color: #1f2937;
        }
        nav {
            background: #1f2937; padding: 1rem 2rem;
        }
        nav a {
            color: #ffffff; text-decoration: none;
            margin-right: 1.5rem; font-weight: bold;
        }
        nav a:hover { text-decoration: underline; }
        .content {
            max-width: 800px;
            margin: 2rem auto; padding: 0 1rem;
        }
        footer {
            text-align: center; padding: 2rem;
            color: #6b7280; font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </footer>
</body>
</html>
