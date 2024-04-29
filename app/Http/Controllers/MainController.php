<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Worker;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function home()
    {
        $countries = Country::with('media')->isPublished()->get();

        return view('main-site.home', compact('countries'));
    }

    public function contact()
    {
        return view('main-site.contact');
    }

    public function blog()
    {
        $blogs = Blog::with('author')->isPublished()->useFilters()->dynamicPaginate();

        return view('main-site.blogs.index', compact('blogs'));
    }

    public function blogDetails($blogId)
    {
        $blog = Blog::isPublished()->findOrFail($blogId);

        $relatedBlogs = Blog::isPublished()
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
        $workers = Worker::isPublished()->useFilters()->dynamicPaginate();

        return view('main-site.workers.index', compact('workers'));
    }

    public function workerDetails($workerId)
    {
        if (auth()->guard('web')->check()) {
            $worker = Worker::findOrFail($workerId);
        } else {
            $worker = Worker::isPublished()->findOrFail($workerId);
        }

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
