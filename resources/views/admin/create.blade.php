<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Blog Post</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* ------------------ Body & Background ------------------ */
body {
    margin: 0;
    padding: 0;
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #e0e7ff, #f8fafc);
}

/* ------------------ Form Container ------------------ */
.form-container {
    background: #ffffffcc; /* professional semi-transparent */
    padding: 25px 30px;
    max-width: 320px;
    width: 100%;
    border-radius: 16px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    font-variant: small-caps;
    font-style: oblique;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.form-container:hover {
    transform: translateY(-3px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.2);
}

/* ------------------ Heading ------------------ */
h2 {
    text-align: center;
    color: #1e293b;
    margin-bottom: 20px;
    font-size: 1.6rem;
    font-weight: 700;
    position: relative;
}
h2::after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: #3b82f6;
    margin: 8px auto 0;
    border-radius: 2px;
    transition: width 0.3s ease;
}
h2:hover::after {
    width: 90px;
}

/* ------------------ Form Inputs ------------------ */
form {
    display: flex;
    flex-direction: column;
}
input[type="text"],
textarea,
input[type="file"] {
    padding: 10px 12px;
    margin-bottom: 15px;
    border: 2px solid #cbd5e1;
    border-radius: 10px;
    font-size: 0.95rem;
    background: #f1f5f9;
    color: #1e293b;
    transition: all 0.3s ease;
}
input:focus, textarea:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 10px rgba(59,130,246,0.3);
    outline: none;
}
textarea {
    resize: vertical;
    min-height: 90px;
}

/* ------------------ Button ------------------ */
button[type="submit"] {
    padding: 10px;
    background: #3b82f6;
    color: #fff;
    font-weight: 600;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    font-size: 1rem;
    transition: all 0.3s ease;
}
button[type="submit"]:hover {
    transform: translateY(-2px) scale(1.05);
    background: #2563eb;
}

/* ------------------ Responsive ------------------ */
@media (max-width: 450px) {
    .form-container {
        padding: 20px;
    }
    h2 {
        font-size: 1.4rem;
    }
}
</style>
</head>
<body>
<div class="form-container">
    <h2>Create Blog Post</h2>
    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <textarea name="content" placeholder="Content" required></textarea>
        <input type="file" name="image">
        <button type="submit">Save</button>
    </form>
</div>
</body>
</html>
