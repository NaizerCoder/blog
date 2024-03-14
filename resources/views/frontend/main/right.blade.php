<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Категории</h3>
        <ul class="categories">
            @foreach($categories as $category)
                <li><a href="{{route('frontend.category.show',$category->id)}}">{{$category->title}} <span>({{$category->post->count()}})</span></a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">ТОП-3</h3>
        @foreach($likedPosts as $postTop)
            <div class="block-21 mb-4 d-flex">
                <a href="{{route('frontend.post.show',$postTop->id)}}" class="blog-img mr-4"
                   style="background-image: url('{{url('images/'. $postTop->main_image)}}');"></a>
                <div class="text">
                    <h3 class="heading"><a href="{{route('frontend.post.show',$postTop->id)}}">{{$postTop->title}}</a>
                    </h3>
                    <div class="meta">
                        <div><a href="#"><span
                                    class="icon-calendar"></span> {{$postTop->dateCreate->translatedFormat('F')}} {{$postTop->dateCreate->format('d, Y')}}
                            </a></div>
                        <div><a href="#"><span class="icon-chat"></span> {{$postTop->comments->count()}}</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Облако тэгов</h3>
        <ul class="tagcloud">
            @foreach($tags as $tag)
                <a href="{{route('frontend.tag.show',$tag->id)}}" class="tag-cloud-link">{{$tag->title}}</a>
            @endforeach

        </ul>
    </div>

    <div class="sidebar-box subs-wrap img py-4"
         style="background-image: url({{asset('images/'.$post_random[0]->main_image)}});">
        <div class="overlay"></div>
        <span class="text-center">Случайная статья</span>
        <h3 class="mb-4 sidebar-heading">{{$post_random[0]->title}}</h3>
        <p class="mb-4">{{ mb_strimwidth(strip_tags($post_random[0]->content), 0, 100, '...') }}</p>
        <div class="d-flex justify-content-center">
            <a href="{{route('frontend.post.show',$post_random[0]->id)}}">
                <button class="mt-2 btn btn-secondary btn-lg rounded-0">читать</button>
            </a>
        </div>
    </div>

</div><!-- END COL -->
