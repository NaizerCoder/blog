@extends('frontend.layouts.main')

@section('title')
    <title>{{$post->title}} | Travel Blog</title>
@endsection

@section('content')
    <div class="col-lg-8 px-md-5 py-2">
        <div class="row pt-md-4 d-block">
            <div><h1 class="mb-3">{{$post->title}}</h1></div>
            <div class="meta">
                <span>
                    <i class="icon-calendar mr-2"></i>{{$date->day}} {{$date->getTranslatedMonthName('Do MMMM')}} {{$date->year}} • {{$date->format('H:i')}}
                </span>
                <span><i class="icon-comment2 mr-2"></i>{{$post->comments->count()}} Комментариев</span>
            </div>
            <p>
                <img src="{{asset('images/'. $post->main_image)}}" alt="" class="img-fluid">
            </p>
            <div class="mb-0">
                {!! $post->content !!}
            </div>
            <!--LIKES-->
            <div class="d-flex flex-wrap align-content-end mb-3">
                <form action="{{route('frontend.post_like.store',$post->id)}}" method="post">
                    @csrf
                    @auth()
                        <span>{{$post->liked_users_count}}</span>
                    @endauth
                    <button type="submit" class="border-0 bg-transparent fle">
                        @auth()
                            @if(auth()->user()->likePosts->contains($post->id))
                                <i class="fas fa-heart" style="width:2px; color:#ed6ca7;"></i>
                            @else
                                <i class="far fa-heart"></i>
                            @endif
                        @endauth
                    </button>
                </form>
                @guest()
                    <span>{{$post->liked_users_count}}</span>
                    <button class="border-0 bg-transparent fle">
                        <i class="far fa-heart"></i>
                    </button>
                @endguest()
                <!--END LIKES-->
            </div>
            <div class="tag-widget post-tag-container mb-5 mt-lg-0">
                <div class="tagcloud">
                    @foreach($post->tags as $tag)
                        <a href="{{route('frontend.tag.show',$tag->id)}}" class="tag-cloud-link">{{$tag->title}}</a>
                    @endforeach
                </div>
            </div>

            <div class="pt-0 mt-0">
                <h3 class="mb-2 font-weight-bold">{{$post->comments->count()}} Комментариев</h3>
                @guest()
                    <div class="text-danger mb-2"><a href="{{asset('/login')}}">Войдите</a> чтобы оставить комменатрий
                    </div>
                @endguest()
                <ul class="comment-list">
                    @foreach($post->comments as $comment)
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="{{asset('andrea/images/noname.jpg')}}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>{{$comment->user->name}}</h3>
                                <div class="meta">{{$comment->dateCreate->diffForHumans()}}
                                    ({{$comment->dateCreate->format('d.m.Y')}})
                                </div>
                                <p>{{ $comment->message }} </p>
                            </div>
                        </li>
                    @endforeach

                </ul>
                <!-- END comment-list -->
                @auth()
                    <div class="comment-form-wrap pt-1">
                        <h3 class="mb-0">Оставить комментарий</h3>
                        <form action="{{route('frontend.post_comment.store',$post->id)}}" method="post"
                              class="p-3 p-md-5 bg-light">
                            @csrf
                            <div class="form-group">
                                <label for="message">Ваш текст:</label>
                                <textarea name="message" id="message" cols="30" rows="10"
                                          class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Отправить" class="btn py-3 px-4 btn-primary">
                            </div>
                        </form>
                    </div>
                @endauth
            </div>
        </div><!-- END-->
    </div>
    @include('frontend.main.right')
@endsection

