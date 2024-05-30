@extends('layouts.app')
@section('contents')
@if(!isset($breadcrums))
<div class="page-header-area" style="background: #ddd url('{{asset('/images', $breadcrums->image)}}') no-repeat center">
   @else 
   <div class="page-header-area" style="background: #ddd url('{{asset('/images')}}') no-repeat center">
   @endif
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="page-header-title text-center text-md-start">
                    {{-- <h1>Blog Details</h1> --}}
                </div>
            </div>

            <div class="col-md-6 col-lg-8">
                {{-- <nav class="page-header-breadcrumb text-center text-md-end">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li class="active"><a href="">Blog Details</a></li>
                    </ul>
                </nav> --}}
            </div>
        </div>
    </div>
</div>
<!-- Start Page Content Wrapper -->
<div class="page-content-wrap pt-90 pt-sm-60 pb-90 pb-sm-60 mb-xl-30">
    <div class="blog-details-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 order-1 order-lg-0">
                    <div class="sidebar-area mt-md-58 mt-sm-58">
                        <aside class="sidebar-wrapper">
                           

                            <!-- Start Single Sidebar -->
                            <div class="sidebar-item">
                                <h3 class="sidebar-title">Recent Blogs</h3>
                                <div class="sidebar-body">
                                    @forelse($popular as $post)
                                    <div class="recent-news-item">
                                        <figure class="recent-news-item__thumb">
                                            <a href="{{route('blog.details', encrypt($post->id))}}"><img src="{{asset('images/'.$post->image)}}"
                                                                             alt="Recent News"/></a>
                                        </figure>

                                        <div class="recent-news-item__info">
                                            <h3><a href="{{route('blog.details', encrypt($post->id))}}">{{$post->title}}</a></h3>
                                            <div class="news-meta">
                                                {{-- <span class="post-date"><i class="fa fa-clock-o"></i>{{$post->created_at->format('d/m/y')}}</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @empty 

                                    @endforelse
                                </div>
                            </div>
                            <!-- End Single Sidebar -->

                            <!-- Start Single Sidebar -->
                         
                            <!-- End Single Sidebar -->
                        </aside>
                    </div>
                </div>

                <div class="col-lg-8 order-0">
                    <article class="blog-details-content">
                        <figure class="blog-thumb">
                            <img src="{{asset('images/'.$blogs->image)}}" alt="Blog" width="200px" height="auto">
                        </figure>

                        <div class="blog-info">
                            <h2>{{$blogs->title}}</h2>
                            <div class="blog-meta">
                                {{-- <a href="blog-details.html" class="post-date"><i class="fa fa-clock-o"></i> --}}
                                   {{-- {{$blogs->created_at->format('d/M/Y')}}</a> --}}
                              
                              
                            </div>

                            <p>{!! $blogs->contents !!}</p>
                        </div>

                        <div class="blog-share">
                            {{-- <h4><i class="fa fa-share-alt"></i> Share:</h4>
                            <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-reddit"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-digg"></i></a> --}}
                        </div>
                    </article>

                    <!-- Start Comment Area Wrapper -->
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection