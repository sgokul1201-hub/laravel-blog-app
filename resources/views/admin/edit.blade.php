<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Blog Post</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* ------------------ Body ------------------ */
body {
    margin: 0;
    padding: 0;
    font-family: 'Inter', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #f0f4f8;
}

/* ------------------ Form Container ------------------ */
.form-container {
    background: rgba(255,255,255,0.95);
    padding: 20px 25px; /* smaller padding for compact height */
    border-radius: 16px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    width: 100%;
    max-width: 360px; /* smaller container */
    overflow: hidden;
    animation: fadeInUp 0.8s ease;
}

/* ------------------ Animation ------------------ */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ------------------ Heading ------------------ */
h2 {
    text-align: center;
    color: #1e293b;
    font-size: 1.6rem; /* smaller heading */
    font-style: oblique;
    font-variant: small-caps;
    text-transform: uppercase;
    margin-bottom: 15px; /* reduced margin */
}

/* ------------------ Input Groups ------------------ */
.input-group {
    position: relative;
    margin-bottom: 10px; /* less spacing */
}

.input-group input,
.input-group textarea {
    width: 100%;
    padding: 8px 10px; /* smaller padding */
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 0.9rem; /* smaller font */
    font-style: oblique;
    font-variant: small-caps;
    text-transform: uppercase;
    outline: none;
    transition: all 0.3s ease;
    background: #f9fafb;
}

.input-group textarea {
    min-height: 60px; /* smaller height */
    resize: vertical;
}

.input-group label {
    position: absolute;
    left: 10px;
    top: 8px;
    color: #64748b;
    font-size: 0.8rem;
    pointer-events: none;
    transition: 0.3s ease;
}

.input-group input:focus + label,
.input-group input:not(:placeholder-shown) + label,
.input-group textarea:focus + label,
.input-group textarea:not(:placeholder-shown) + label {
    top: -8px;
    left: 6px;
    font-size: 0.7rem;
    color: #3b82f6;
    background: #f0f4f8;
    padding: 0 4px;
    border-radius: 4px;
}

/* ------------------ Image ------------------ */
img {
    display: block;
    margin: 8px auto;
    border-radius: 8px;
    max-width: 100%;
    box-shadow: 0 4px 15px rgba(0,0,0,0.12);
    transition: transform 0.3s ease;
}

img:hover {
    transform: scale(1.03);
}

/* ------------------ Submit Button ------------------ */
button[type="submit"] {
    padding: 8px;
    width: 100%;
    background: linear-gradient(135deg, #3b82f6, #6dd5fa);
    color: #fff;
    font-weight: 600;
    border: none;
    border-radius: 35px;
    cursor: pointer;
    font-size: 0.85rem;
    font-style: oblique;
    font-variant: small-caps;
    text-transform: uppercase;
    transition: all 0.3s ease;
}

button[type="submit"]:hover {
    transform: translateY(-1px) scale(1.02);
    box-shadow: 0 6px 15px rgba(59,130,246,0.3);
}

/* ------------------ Responsive ------------------ */
@media (max-width: 480px) {
    .form-container {
        padding: 15px;
        max-width: 95%;
    }
    h2 {
        font-size: 1.4rem;
    }
}
</style>
</head>
<body>
<div class="form-container">
    <h2>Edit Blog Post</h2>
    <form method="POST" action="{{ route('admin.update',$blog->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group">
            <input type="text" name="title" value="{{ $blog->title }}" placeholder=" " required>
            <label>Title</label>
        </div>

        <div class="input-group">
            <input type="text" name="author" value="{{ $blog->author }}" placeholder=" " required>
            <label>Author</label>
        </div>

        <div class="input-group">
            <textarea name="content" placeholder=" " required>{{ $blog->content }}</textarea>
            <label>Content</label>
        </div>

        @if($blog->image)
            <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image">
        @endif

        <div class="input-group">
            <input type="file" name="image">
            <label>Upload Image</label>
        </div>

        <button type="submit">Update Post</button>
    </form>
</div>
</body>
</html>
