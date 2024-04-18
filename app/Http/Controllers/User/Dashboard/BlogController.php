<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateBlogRequest;
use App\Http\Requests\User\Dashboard\UpdateBlogRequest;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::dynamicPaginate();
        return view('dashboard.blogs.index', compact('blogs'));
    }
    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store(CreateBlogRequest $request)
    {
        request()->user()->blogs()->create($request->validated());

        return redirect()->route('user.dashboard.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        $blog->load('author');
        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->validated());

        return back()->with('success', 'Blog updated successfully.');
    }

    public function show(Blog $blog)
    {
        $blog->load('author');
        return view('dashboard.blogs.show', compact('blog'));
    }

    public function destroy(Blog $blog)
    {
        $blog->account()->delete();

        return redirect()->route('user.dashboard.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
