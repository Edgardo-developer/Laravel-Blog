@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post aos-init aos-animate" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{$post->category->title}}</p>
                                @auth
                                <form action="{{route('post.like.store', $post->id)}}" method="post">
                                    @csrf
                                    <span>{{$post->liked_users_count}}</span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <i class="fas fa-heart"></i>
                                        @else
                                            <i class="far fa-heart"></i>
                                        @endif
                                    </button>
                                </form>
                                @endauth
                                @guest()
                                    <div>
                                        <span>{{$post->liked_users_count}}</span>
                                        <i class="far fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{route('post.show', $post)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                    <div style="margin: -80px auto 0 auto;">
                        {{$posts->links()}}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $randomPost)
                                <div class="col-md-6 blog-post aos-init" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ asset('storage/' . $randomPost->preview_image) }}" alt="blog post">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="blog-post-category">{{$randomPost->category->title}}</p>
                                        @auth()
                                            <form action="{{route('post.like.store', $randomPost->id)}}" method="post">
                                                <span>{{$randomPost->liked_users_count}}</span>
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent">
                                                    @if(auth()->user()->likedPosts->contains($randomPost->id))
                                                        <i class="fas fa-heart"></i>
                                                    @else
                                                        <i class="far fa-heart"></i>
                                                    @endif
                                                </button>
                                            </form>
                                        @endauth
                                        @guest()
                                            <div>
                                                <span>{{$randomPost->liked_users_count}}</span>
                                                <i class="far fa-heart"></i>
                                            </div>
                                        @endguest
                                    </div>
                                    <a href="{{route('post.show', $randomPost->title)}}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$randomPost->title}}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar aos-init" data-aos="fade-left">
                    <div class="widget widget-post-carousel">
                        <h5 class="widget-title">Post Lists</h5>
                        <div class="post-carousel">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselId" data-slide-to="0" class=""></li>
                                    <li data-target="#carouselId" data-slide-to="1" class=""></li>
                                    <li data-target="#carouselId" data-slide-to="2" class="active"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <figure class="carousel-item">
                                        <img src="{{asset('assets/images/blog_widget_carousel.jpg')}}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                        </figcaption>
                                    </figure>
                                    <figure class="carousel-item">
                                            <img src="{{asset('assets/images/blog_7.jpg')}}" alt="First slide">
                                            <figcaption class="post-title">
                                                <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                            </figcaption>
                                    </figure>
                                    <div class="carousel-item active">
                                            <img src="{{asset('assets/images/blog_5.jpg')}}" alt="First slide">
                                            <figcaption class="post-title">
                                                <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                            </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Post List</h5>
                        <ul class="post-list">
                            @foreach($likedPosts as $likedPost)
                                <li class="post">
                                    <a href="{{route('post.show', $likedPost->title)}}" class="post-permalink media">
                                        <img src="{{'storage/' . $likedPost->preview_image}}" alt="blog post">
                                        <div class="media-body d-flex justify-content-between">
                                            <h6 class="post-title">{{$likedPost->title}}</h6>
                                            @auth
                                            <form action="{{route('post.like.store', $likedPost->id)}}" method="post">
                                                @csrf
                                                    <span>{{$likedPost->liked_users_count}}</span>
                                                    <button type="submit" class="border-0 bg-transparent">
                                                    @auth()
                                                        @if(auth()->user()->likedPosts->contains($likedPost->id))
                                                            <i class="fas fa-heart"></i>
                                                        @else
                                                            <i class="far fa-heart"></i>
                                                        @endif
                                                    @endauth
                                                </button>
                                            </form>
                                            @endauth
                                            @guest()
                                                <div>
                                                    <span>{{$likedPost->liked_users_count}}</span>
                                                    <i class="far fa-heart"></i>
                                                </div>
                                            @endguest
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <img src="{{asset('assets/images/blog_widget_categories.jpg')}}" alt="categories" class="w-100">
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
