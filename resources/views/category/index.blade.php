@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="text-center mb-3" data-aos="fade-up">Категории</h1>
            <section class="featured-posts-section">
                <div class="row m-auto w-50 text-center">
                    <ul class="list-group w-75 mb-2">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                                <a href="{{route('category.show',$category->id)}}" class="blog-post-permalink">
                                    {{$category->title}} <span><sup>{{$category->post_count}}</sup></span>
                                </a></li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
        </div>
        </div>
    </main>

@endsection

