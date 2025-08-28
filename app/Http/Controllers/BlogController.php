<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function home()
    {
        $blogs = Blog::latest()->get();
        return view('home', compact('blogs'));
    }

    public function admin()
    {
        // Fetch blogs ordered by ID ascending
$blogs = Blog::orderBy('id', 'asc')->get();

return view('admin.dashboard', compact('blogs'));

    }

    public function create() { return view('admin.create'); }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'author'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images','public');
        }

        Blog::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'author'=>$request->author,
            'image'=>$imagePath
        ]);

        return redirect()->route('admin');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->update($request->only('title','content','author'));

        if($request->hasFile('image')){
            $blog->image = $request->file('image')->store('images','public');
            $blog->save();
        }

        return redirect()->route('admin');
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('admin');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('post', compact('blog'));
    }
}
