<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Категории</h3>
        <ul class="categories">
            @foreach($categories as $category)
                <li><a href="#">{{$category->title}} <span>({{$category->post->count()}})</span></a></li>
            @endforeach
        </ul>
    </div>

    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Популярные статьи</h3>
        @foreach($likedPosts as $postTop)
            <div class="block-21 mb-4 d-flex">
                <a href="{{route('frontend.post.show',$postTop->id)}}" class="blog-img mr-4" style="background-image: url('{{url('images/'. $postTop->main_image)}}');"></a>
                <div class="text">
                    <h3 class="heading"><a href="{{route('frontend.post.show',$postTop->id)}}">{{$postTop->title}}</a></h3>
                    <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> {{$postTop->dateCreate->translatedFormat('F')}} {{$postTop->dateCreate->format('d, Y')}}</a></div>
                        <div><a href="#"><span class="icon-chat"></span> {{$postTop->comments->count()}}</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Tag Cloud</h3>
        <ul class="tagcloud">
            <a href="#" class="tag-cloud-link">animals</a>
            <a href="#" class="tag-cloud-link">human</a>
            <a href="#" class="tag-cloud-link">people</a>
            <a href="#" class="tag-cloud-link">cat</a>
            <a href="#" class="tag-cloud-link">dog</a>
            <a href="#" class="tag-cloud-link">nature</a>
            <a href="#" class="tag-cloud-link">leaves</a>
            <a href="#" class="tag-cloud-link">food</a>
        </ul>
    </div>

    <div class="sidebar-box subs-wrap img py-4" style="background-image: url('andrea/images/bg_1.jpg');">
        <div class="overlay"></div>
        <h3 class="mb-4 sidebar-heading">Newsletter</h3>
        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
        <form action="#" class="subscribe-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Email Address">
                <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
            </div>
        </form>
    </div>

    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Archives</h3>
        <ul class="categories">
            <li><a href="#">Decob14 2018 <span>(10)</span></a></li>
            <li><a href="#">September 2018 <span>(6)</span></a></li>
            <li><a href="#">August 2018 <span>(8)</span></a></li>
            <li><a href="#">July 2018 <span>(2)</span></a></li>
            <li><a href="#">June 2018 <span>(7)</span></a></li>
            <li><a href="#">May 2018 <span>(5)</span></a></li>
        </ul>
    </div>


    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Paragraph</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod
            mollitia delectus aut.</p>
    </div>
</div><!-- END COL -->
