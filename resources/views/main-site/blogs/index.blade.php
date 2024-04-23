@extends('main-site.layouts.shared.app-layout')

@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Contact Us")])
@endsection

@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>

<x-main-site.page-header title="{{ __('Blog') }}" />
<x-main-site.search-bar />

<section class="mt-4 ps-11 pe-11 xl-ps-2 xl-pe-2 bg-very-light-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-main-site.search-result-text />
                <ul class=" blog-grid blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                    <li class="grid-sizer"></li>
                    @forelse($blogs as $blog)
                    <li class="grid-item">
                        <div class="card border-0 border-radius-4px box-shadow-extra-large box-shadow-extra-large-hover">
                            <div class="blog-image">
                                <a href="{{ route('home.blog.details', $blog->id) }}" class="d-block">
                                    @php
                                    $src = $blog->hasMedia('blog_images') ? $blog->getFirstMedia('blog_images')->getUrl() : 'https://via.placeholder.com/800x570';
                                    @endphp
                                    <img src="{{ $src }}" alt="{{ __('Blog Image') }}" />
                                </a>
                            </div>
                            <div class="card-body p-12">
                                <a href="{{route('home.blog.details',$blog->id)}}" class="card-title mb-15px fw-600 fs-17 lh-26 text-dark-gray text-dark-gray-hover d-inline-block">
                                    {{ $blog->title }}
                                </a>
                                <div class="author d-flex justify-content-center align-items-center position-relative overflow-hidden fs-14 text-uppercase">
                                    <div class="me-auto">
                                        <span class="blog-date fw-500 d-inline-block">
                                            <i class="far fa-calendar-check"></i>&nbsp;
                                            &nbsp;
                                            {{ date("F j, Y", strtotime($blog->published_at)) }}
                                        </span>
                                        <div class="d-inline-block author-name">{{ __('By') }} <a href="#" class="text-dark-gray text-dark-gray-hover text-decoration-line-bottom fw-600">{{ $blog->author->name }}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @empty
                    <div class="alert alert-danger text-center bg-white">
                        <a href="#" class="close" data-bs-dismiss="alert" aria-label="close"></a>
                        {{ __('There are no items available now.') }}
                    </div>
                    @endforelse
                </ul>
            </div>
            <x-main-site.pagination :model="$blogs" />
        </div>
    </div>
</section>
@endsection
