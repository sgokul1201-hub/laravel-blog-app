<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LaravelBlog 2025 UI</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
</head>
<body>

<header>
  <a href="/" class="home-link"><h1>LaravelBlog</h1></a>
  <div class="nav-buttons">
      <a href="{{ url('login') }}">Login</a>
      <a href="{{ url('register') }}">Register</a>
  </div>
</header>

<main class="auth-container">
  @yield('content')
</main>

</body>
</html>
