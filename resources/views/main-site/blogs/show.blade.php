@extends('main-site.layouts.shared.app-layout')
@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Contact Us")])
@endsection
@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>
<!-- start page title -->
<section class="p-0 sm-pb-40px top-space-margin page-title-center-alignment">
    <div class="container">
        <div class="row align-items-center justify-content-center small-screen sm-h-auto">
            <div class="col-lg-10 text-center">
                <span class="fs-18 mb-30px d-inline-block sm-mb-20px">By <a href="#" class="text-dark-gray text-dark-gray-hover text-decoration-line-bottom">{{$blog->author->name}}</a> on {{date("F j, Y", strtotime($blog->published_at)) }}</span>
                <h1 class="alt-font fw-600 text-dark-gray ls-minus-2px mb-0">{{$blog->title}}</h1>
            </div>
            @if ($blog->hasMedia('blog_images'))
            <img src="{{ $blog->getFirstMedia('blog_images')->getUrl() }}" alt="Blog Image" />
            @endif
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    {!! $blog->context !!}
                </div>
            </div>
        </div>
    </div>
</section>

@if ($relatedBlogs->isNotEmpty())

<!-- start section -->
<section class="bg-very-light-gray">
    <div class="container">
        <div class="row justify-content-center mb-1">
            <div class="col-lg-7 text-center">
                <span class="alt-font fw-500 text-uppercase d-inline-block">You may also like</span>
                <h5 class="alt-font text-dark-gray fw-500">Related posts</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="blog-grid blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                    <li class="grid-sizer"></li>



                    @foreach($relatedBlogs as $blog)

                    <li class="grid-item">
                        <div class="card border-0 border-radius-4px box-shadow-extra-large box-shadow-extra-large-hover">
                            <div class="blog-image">
                                <a href="{{route('home.blog.details',$blog->id)}}" class="d-block"><img src="https://via.placeholder.com/800x570" alt="" /></a>
                            </div>
                            <div class="card-body p-12">
                                <a href="{{route('home.blog.details',$blog->id)}}" class="card-title mb-15px fw-600 fs-17 lh-26 text-dark-gray text-dark-gray-hover d-inline-block">
                                    {{$blog->title}}
                                </a>
                                <div class="author d-flex justify-content-center align-items-center position-relative overflow-hidden fs-14 text-uppercase">
                                    <div class="me-auto">
                                        <span class="blog-date fw-500 d-inline-block">{{$blog->updated_at->diffForHumans()}}</span>
                                        <div class="d-inline-block author-name">By <a href="#" class="text-dark-gray text-dark-gray-hover text-decoration-line-bottom fw-600">{{$blog->author->name}}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end section -->
@endif
@endsection