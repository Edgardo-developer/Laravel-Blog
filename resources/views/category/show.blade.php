@extends('layouts.main')
@section('content')
<main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                Written by Richard Searls• {{ $dateString }} • {{$post->comments->count()}} Comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'.$post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!!  $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section>
                        <form action="{{route('post.like.store', $post->id)}}" method="post">
                            @csrf
                            <span>{{$post->liked_users_count}}</span>
                            <button type="submit" class="border-0 bg-transparent">
                            @auth()
                                @if(auth()->user()->likedPosts->contains($post->id))
                                    <i class="fas fa-heart"></i>
                                @else
                                    <i class="far fa-heart"></i>
                                @endif
                            @endauth
                            </button>
                        </form>
                    </section>
                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{asset('storage/'. $relatedPost->preview_image)}}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{$relatedPost->category->title}}</p>
                                <a href="{{route('post.show', $relatedPost->id)}}"><h5 class="post-title">{{$relatedPost->title}}</h5></a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply ({{$post->comments->count()}})</h2>
                        @auth()
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="message" class="sr-only">Comment</label>
                                <textarea name="message" id="message" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                        @endauth
                        <div class="card-footer card-comments">
                            @foreach($post->comments as $comment)
                            <div class="card-comment">
                              <div class="comment-text">
                                <span class="username">
                                  {{$comment->user->name}}
                                    <br>
                                  <span class="text-muted float-right">{{$comment->DateAsCarbon->diffForHumans()}}</span>
                                </span><!-- /.username -->
                                {{$comment->message}}
                              </div>
                              <!-- /.comment-text -->
                            </div>
                                <br><br>
                            @endforeach
                          </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
