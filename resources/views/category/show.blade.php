@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="text-center mb-3" data-aos="fade-up">Категории</h1>
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
                                    <span>{{$post->liked_users_count}}</span>
                                    <button type="submit" class="border-0 bg-transparent fle">
                                        @auth()
                                            @if(auth()->user()->likePosts->contains($post->id))
                                                <i class="fas fa-heart"></i>
                                            @else
                                                <i class="far fa-heart"></i>
                                            @endif
                                        @endauth

                                        @guest()
                                                <i class="far fa-heart"></i>
                                        @endguest()
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

        </div>

    </main>

@endsection

