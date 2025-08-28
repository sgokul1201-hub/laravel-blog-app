<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{{ $blog->title }}</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* ------------------ Global ------------------ */
body {
    font-family: 'Inter', sans-serif;
    margin: 0;
    padding: 40px 20px;
    background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    overflow-x: hidden;
}

/* ------------------ Blog Container ------------------ */
.blog-container {
    background: rgba(255, 255, 255, 0.95);
    padding: 25px 30px;
    max-width: 550px; /* smaller container */
    width: 100%;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.blog-container:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

/* ------------------ Title ------------------ */
.blog-container h2 {
    font-size: 1.9rem;
    font-weight: 700;
    font-style: oblique;
    font-variant: small-caps;
    text-transform: uppercase;
    margin-bottom: 12px;
    color: #1e293b;
    position: relative;
}
.blog-container h2::after {
    content: '';
    display: block;
    width: 50px;
    height: 3px;
    background: #3b82f6;
    margin-top: 6px;
    border-radius: 2px;
    transition: width 0.3s ease;
}
.blog-container:hover h2::after {
    width: 90px;
}

/* ------------------ Author ------------------ */
.blog-container p.author {
    font-style: oblique;
    font-variant: small-caps;
    text-transform: uppercase;
    color: #64748b;
    margin-bottom: 20px;
}

/* ------------------ Image ------------------ */
.blog-container img {
    display: block;
    max-width: 100%;
    height: auto;
    margin: 20px 0;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.blog-container img:hover {
    transform: scale(1.03);
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
}

/* ------------------ Content ------------------ */
.blog-container p.content {
    font-size: 1rem;
    line-height: 1.7;
    color: #334155;
    margin-bottom: 30px;
}

/* ------------------ Back Button ------------------ */
.blog-container a.back-btn {
    text-decoration: none;
    display: inline-block;
    padding: 10px 25px;
    background: #3b82f6;
    color: #fff;
    font-weight: 500;
    border-radius: 50px;
    box-shadow: 0 4px 12px rgba(59,130,246,0.3);
    transition: all 0.3s ease;
}
.blog-container a.back-btn:hover {
    background: #2563eb;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 20px rgba(59,130,246,0.4);
}

/* ------------------ Responsive ------------------ */
@media (max-width: 768px) {
    .blog-container {
        padding: 20px 18px;
    }
    .blog-container h2 {
        font-size: 1.6rem;
    }
    .blog-container p.content {
        font-size: 0.95rem;
    }
}
</style>
</head>
<body>
<div class="blog-container">
    <h2>{{ $blog->title }}</h2>
    <p class="author">By {{ $blog->author }}</p>

    @if($blog->image)
        <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image">
    @endif

    <p class="content">{{ $blog->content }}</p>
    <a href="{{ route('home') }}" class="back-btn">← Back</a>
</div>
</body>
</html>
