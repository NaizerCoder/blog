@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="text-center mb-3" data-aos="fade-up">Товары</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post mb-1" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <a href="{{route('post.show',$post->id)}}" class="blog-post-permalink">
                                    <img src="{{url('images/'. $post->main_image)}}" alt="blog post">
                                </a>
                            </div>
                            <!-- <p class="blog-post-category">{{$post->title}}</p> -->
                            <div class="float-left">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </div>
                            <div class="d-flex justify-content-end">
                                <form action="{{route('post.like.store',$post->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="border-0 bg-transparent fle">
                                        @auth()
                                           @if(auth()->user()->likePosts->contains($post->id))
                                                <i class="fas fa-heart"></i>
                                            @else
                                                <i class="far fa-heart"></i>
                                           @endif
                                        @endauth
                                    </button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: 20px">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($posts_random as $postRand)

                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{url('images/'. $postRand->main_image)}}" alt="blog post">
                                    </div>
                                    <!--  <p class="blog-post-category">{{$postRand->title}}</p> -->
                                    <a href="#!" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$postRand->title}}</h6>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">

                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Топ-5</h5>
                        <ul class="post-list">

                            @foreach($likedPosts as $postTop)
                                <li class="post">
                                    <a href="#!" class="post-permalink media">
                                        <img src="{{url('images/'. $postTop->main_image)}}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{$postTop->title}}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </main>

@endsection

