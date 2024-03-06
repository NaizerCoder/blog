@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$date->translatedFormat('F')}}
                ,{{$date->year}} • {{$date->format('H:i')}} • {{$post->comments->count()}} комментариев</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('images/'. $post->main_image)}}" alt="featured image"
                     class="w-50 justify-content-center">
            </section>
            <section class="post-content" style="'margin-bottom: -10px'">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="py-0">
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
                    </section>

                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <a href="{{route('post.show',$relatedPost->id)}}">
                                        <img src="{{asset('images/'.$relatedPost->main_image)}}" alt="related post"
                                             class="post-thumbnail">
                                    </a>
                                    <p class="post-category">{{$relatedPost->category->title}}</p>
                                    <h5 class="post-title">{{$relatedPost->title}}</h5>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    <section class="comment-list">
                        <div>
                            <h3 class="mb-5 font-weight-bold">Комментарии ({{$post->comments->count()}})</h3>
                            <div class="comment-text">
                                @foreach($post->comments as $comment)
                                    <div class="comment-body">
                                        <b>{{$comment->user->name}}</b>
                                        <div
                                            style="color:slategray; font-size:14px">{{$comment->dateCreate->diffForHumans()}}
                                            ({{$comment->dateCreate->format('d.m.Y')}})
                                        </div>
                                        <p>{!! $comment->message !!}</p>
                                    </div>
                                @endforeach
                            </div>
                            <!-- END comment-list -->
                        </div>
                        @guest()
                            <div class="text-danger">Что бы оставить комменатрий <a href="{{asset('/login')}}">войдите</a></div>
                        @endguest

                    </section>

                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Оставьте комментарий</h2>
                            <form action="{{route('post.comment.store',$post->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Комментарии</label>
                                        <textarea name="message" id="comment" class="form-control"
                                                  placeholder="Напишите комментарий"
                                                  rows="10"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-12" data-aos="fade-up">
                                            <input type="submit" value="Отправить" class="btn btn-warning">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection

