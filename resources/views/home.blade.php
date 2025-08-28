<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LaravelBlog 2025 UI</title>
<link href="assets/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <a href="/" class="home-link"><h1>LaravelBlog</h1></a>
    <div class="nav-buttons">
        <a href="{{url('login')}}">Login</a>
        <a href="{{url('register')}}">Register</a>
    </div>
</header>

<div class="blogs">
    @foreach($blogs as $blog)
    <div class="blog-card" onclick="location.href='{{ route('post.show', $blog->id) }}'">
        @if($blog->image)
            <img src="{{ asset('storage/'.$blog->image) }}">
        @endif
        <h4>{{ $blog->title }}</h4>
        <p>{{ $blog->created_at->format('d M Y') }}</p> <!-- post date -->
        <p class="author">{{ $blog->author }}</p> <!-- author below date -->
    </div>
    @endforeach
</div>


<script>
let lastScrollTop = 0;
const header = document.querySelector('header');
window.addEventListener('scroll', () => {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if(scrollTop > lastScrollTop && scrollTop > 50){
        header.classList.add('hidden');
    } else {
        header.classList.remove('hidden');
    }
    lastScrollTop = scrollTop;
});
function showLogin(){ document.getElementById('loginPopup').classList.add('active'); }
function closeLogin(){ document.getElementById('loginPopup').classList.remove('active'); }
function showRegister(){ document.getElementById('registerPopup').classList.add('active'); }
function closeRegister(){ document.getElementById('registerPopup').classList.remove('active'); }
</script>

</body>
</html>
