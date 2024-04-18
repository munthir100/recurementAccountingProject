<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Status;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function home()
    {
        return view('main-site.home');
    }

    public function contact()
    {
        return view('main-site.contact');
    }

    public function blog()
    {
        $blogs = Blog::with('author')->whereStatusId(Status::PUBLISHED)->dynamicPaginate();

        return view('main-site.blogs.index', compact('blogs'));
    }

    public function blogDetails($blogId)
    {
        $blog = Blog::whereStatusId(Status::PUBLISHED)->findOrFail($blogId);

        $relatedBlogs = Blog::whereStatusId(Status::PUBLISHED)
            ->where('title', '%like%', $blog->title)
            ->limit(20)->get();

        return view('main-site.blogs.show', compact('blog', 'relatedBlogs'));
    }


    public function about()
    {
        return view('main-site.about');
    }

    public function workers()
    {
        $workers = Worker::whereStatusId(Status::ACTIVE)->dynamicPaginate();

        return view('main-site.workers.index', compact('workers'));
    }

    public function workerDetails($workerId)
    {
        $worker = Worker::where('status_id', Status::ACTIVE)->findOrFail($workerId);
        return view('main-site.workers.show', compact('worker'));
    }

    public function changeLocale(Request $request)
    {
        $request->validate(['locale' => 'string|in:ar,en']);
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }
}
