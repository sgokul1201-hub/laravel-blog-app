<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* ------------------ Global ------------------ */
body {
    font-family: 'Inter', sans-serif;
    background: #f0f4f8;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
}

.container {
    max-width: 850px;
    width: 100%;
    background: #fff;
    border-radius: 12px;
    padding: 20px 25px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* ------------------ Heading ------------------ */
h2 {
    color: #1e293b;
    margin-bottom: 15px;
    font-style: oblique;
    font-variant: small-caps;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 1.5rem;
}

/* ------------------ Buttons ------------------ */
a {
    margin-right: 10px;
    text-decoration: none;
    font-weight: 600;
    color: #fff;
    padding: 6px 12px;
    border-radius: 6px;
    transition: background 0.3s, transform 0.2s;
    font-style: oblique;
    font-variant: small-caps;
    text-transform: uppercase;
}
a.logout { background: #e74c3c; }
a.logout:hover { background: #c0392b; transform: scale(1.05); }
a.create { background: #3b82f6; }
a.create:hover { background: #2563eb; transform: scale(1.05); }

/* ------------------ Table ------------------ */
table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}
th, td {
    padding: 8px 6px;
    text-align: left;
    border-bottom: 1px solid #e0e7ff;
    font-size: 0.85rem;
    word-break: break-word;
}
th {
    background: #e0f2fe;
    color: #1e293b;
}
tr:hover { background: #f1f9ff; }
td.date { font-size: 0.75rem; color: #64748b; }

/* ------------------ Action Buttons ------------------ */
td a.edit, td a.delete {
    padding: 4px 10px;
    margin-right: 4px;
    border-radius: 5px;
    font-size: 0.75rem;
}
a.edit { background: #27ae60; }
a.edit:hover { background: #1e8449; transform: scale(1.05); }
a.delete { background: #c0392b; }
a.delete:hover { background: #922b21; transform: scale(1.05); }

/* ------------------ Responsive ------------------ */
@media (max-width: 768px) {
    .container { padding: 15px 20px; }
    h2 { font-size: 1.3rem; }
    table th, table td { padding: 6px 4px; font-size: 0.75rem; }
}
</style>
</head>
<body>

<div class="container">
    <h2>Admin Dashboard</h2>
    <div style="margin-bottom:15px;">
        <a href="{{ route('logout') }}" class="logout">Logout</a>
        <a href="{{ route('admin.create') }}" class="create">Create Post</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->id }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->author }}</td>
            <td class="date">{{ $blog->created_at->format('d M Y') }}</td>
            <td>
                <a href="{{ route('admin.edit', $blog->id) }}" class="edit">Edit</a>
                <a href="{{ route('admin.delete', $blog->id) }}" class="delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>

</body>
</html>
