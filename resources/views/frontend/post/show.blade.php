@extends('frontend.layouts.main')
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
            <div class="">
                {!! $post->content !!}
            </div>
            <div class="tag-widget post-tag-container mb-5 mt-lg-0">
                <div class="tagcloud">
                    @foreach($post->tags as $tag)
                        <a href="#" class="tag-cloud-link">{{$tag->title}}</a>
                    @endforeach
                </div>
            </div>

            <div class="about-author d-flex p-4 bg-light">
                <div class="bio mr-5">
                    <img src="{{asset('andrea/images/person_1.jpg')}}" alt="Image placeholder" class="img-fluid mb-4">
                </div>
                <div class="desc">
                    <h3>Администратор</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                        voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                        similique, inventore eos fugit cupiditate numquam!</p>
                </div>
            </div>


            <div class="pt-5 mt-5">
                <h3 class="mb-2 font-weight-bold">{{$post->comments->count()}} Комментариев</h3>
                @guest()
                    <div class="text-danger mb-2"><a href="{{asset('/login')}}">Войдите</a> чтобы оставить комменатрий </div>
                @endguest
                <ul class="comment-list">
                    @foreach($post->comments as $comment)
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="{{asset('andrea/images/person_2.jpg')}}" alt="Image placeholder">
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
                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Оставить комментарий</h3>
                        <form action="{{route('frontend.post_comment.store',$post->id)}}" method="post" class="p-3 p-md-5 bg-light">
                            @csrf
                            <div class="form-group">
                                <label for="message">Ваш текст:</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
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
@endsection

