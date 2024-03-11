@extends('frontend.layouts.main')
@section('content')
    <div class="col-xl-8 py-5 px-md-5">
        <div class="row pt-md-4">
            @foreach($posts as $post)
                <div class="col-md-12">
                    <div class="blog-entry ftco-animate d-md-flex">
                        <a href="" class="img img-2" style="background-image: url('{{url('images/'. $post->main_image)}}');"></a>
                        <div class="text text-2 pl-md-4">
                            <h3 class="mb-2"><a href="single.html">{{$post->title}}</a></h3>
                            <div class="meta-wrap">
                                <p class="meta">
                                    <span><i class="icon-calendar mr-2"></i>{{$post->dateCreate->translatedFormat('F')}} {{$post->dateCreate->format('d, Y')}}</span>
                                    <span><a href=""><i class="icon-folder-o mr-2"></i>{{$post->category->title}}</a></span>
                                    <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                </p>
                            </div>
                            <p class="mb-4">{!! mb_substr($post->content, 0, 120) !!}</p>
                            <p><a href="#" class="btn-custom">Читать далее <span class="ion-ios-arrow-forward"></span></a></p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- END-->
        <div class="row">
            <div class="col">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
