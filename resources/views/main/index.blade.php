@extends('layouts.main')
@section('content')
    <main>

        <section class="edica-landing-section edica-landing-blog pt-0">
            <div class="container">
                <h4 class="edica-landing-section-subtitle" data-aos="fade-up">Список новостей</h4>
                <h2 class="edica-landing-section-title" data-aos="fade-up">Главное сегодня</h2>
                <div class="row">

                    @foreach($posts as $post)
                        <div class="col-md-4 landing-blog-post" data-aos="fade-right">
                            <img src="{{url('images/'. $post->main_image)}}" alt="blog post" class="blog-post-thumbnail w-75">
                            <p class="blog-post-category">{{$post->title}}</p>
                            <h4 class="blog-post-title">{{$post->category->title}}</h4>
                            <a href="#!" class="blog-post-link">Learn more</a>
                        </div>
                    @endforeach

                </div>
                <div>{{ $posts->links() }}</div>
            </div>
        </section>
        <section class="edica-landing-section edica-landing-blog-posts">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="blog-post-card blog-post-1 mb-4 mb-md-0" data-aos="fade-right">
                            <p class="post-category">App Design</p>
                            <h2 class="post-title">Check our latest blog post for more update.</h2>
                            <a href="#!" class="post-link">Learn more</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-post-card blog-post-2" data-aos="fade-left">
                            <p class="post-category">App Design</p>
                            <h2 class="post-title">Check our latest blog post for more update.</h2>
                            <a href="#!" class="post-link">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

