<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('blogs.index', ['blogs' => $blogs]);
    }

    public function create(){
        return view('blogs.create');
    }


    public function store(){
        request()->validate([
            'title' => 'required|min:5|max:100',
            'written_by' => 'required|min:2|max:20',
            'image' => 'required|mimes:png,jpg,jfif',
            'description' => 'required|max:5000',
        ]);
        $filename = null;
        if (request()->file('image')) {
            $file = request()->file('image');
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('blogimages'), $filename);
        }
        
        Blog::create([
            'title' => request('title'),
            'image' => $filename,
            'written_by' => request('written_by'),
            'description' => request('description'),
        ]);
        return redirect()->route('blogindex');
    }

    public function edit(Blog $blog){
        return view('blogs.edit', ['blog' => $blog]);
    }

    public function update(Blog $blog){
        request()->validate([
            'title' => 'required|min:5|max:100',
            'written_by' => 'required|min:2|max:20',
            // 'image' => 'required',
            'description' => 'required|max:5000',
        ]);
        $filename = null;
        if (request()->file('image')) {
            $file = request()->file('image');
            $filename = 'blog' . $file->getClientOriginalName();
            $file->move(public_path('blogimages'), $filename);
        }
        
        $blog->update([
            'title' => request('title'),
            'image' => $filename,
            'written_by' => request('written_by'),
            'description' => request('description'),
        ]);
        return redirect()->route('blogindex');
    }

    public function destroy(Blog $blog){
        $blog->delete();
        unlink('blogimages/' . $blog->image);
        return redirect()->route('blogindex');
    }
    public function detailblog(Blog $blog){
        return view('blogs.blogpage', ['blog' => $blog]);

    }




}
