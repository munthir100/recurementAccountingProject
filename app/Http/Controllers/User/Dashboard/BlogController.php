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
        $this->authorize('read blog');
        $blogs = Blog::dynamicPaginate();
        return view('dashboard.blogs.index', compact('blogs'));
    }
    public function create()
    {
        $this->authorize('create blog');
        return view('dashboard.blogs.create');
    }

    public function store(CreateBlogRequest $request)
    {
        $this->authorize('create blog');
        $blog = request()->user()->blogs()->create($request->only(['title', 'context']));
        $blog->addMediaFromRequest('image')->ToMediaCollection('blog_images');

        return redirect()->route('user.dashboard.blogs.index')->with('success', 'created successfully.');
    }

    public function edit(Blog $blog)
    {
        $this->authorize('update blog');
        $blog->load('author');
        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $this->authorize('update blog');
        $blog->update($request->validated());
        if($request->hasFile('image')){
            $blog->clearMediaCollection();
            $blog->addMediaFromRequest('image')->ToMediaCollection('blog_images');
        }
        
        return back()->with('success', 'updated successfully.');
    }

    public function show(Blog $blog)
    {
        $this->authorize('read blog');
        $blog->load('author');
        return view('dashboard.blogs.show', compact('blog'));
    }

    public function destroy(Blog $blog)
    {
        $this->authorize('delete blog');
        $blog->delete();

        return redirect()->route('user.dashboard.blogs.index')->with('success', 'deleted successfully.');
    }
}
