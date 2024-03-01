@extends('admin.layouts.main')
@section('content')
    @php
        //dd($post);
    @endphp
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить пост "{{$post->title}}"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Пользователи</li>
                            <li class="breadcrumb-item active">{{$post->title}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row w-50">
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('patch')

                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="title" value="{{old('title',$post->title)}}"
                                   placeholder="Название поста">
                        </div>
                        @error('title')
                        <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <div class="form-group" class="col-4">
                            <textarea id="summernote" name="content">{{ old('content',$post->content) }}</textarea>
                        </div>
                        @error('content')
                        <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <div class="form-group w-50">
                            <div class="text-bold">Превью</div>
                            <div class="w-25 mb-2">
                                <img src="{{ url('images/'. $post->preview_image)  }}" alt="preview" class="w-100">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label" for="exampleInputFile">Выбрать файл</label>
                                </div>
                                <div class="input-group-append">

                                </div>
                            </div>
                        </div>

                        @error('preview_image')
                        <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror


                        <div class="form-group w-50">
                            <div class="text-bold">Главное изображение</div>
                            <div class="w-25 mb-2">
                                <img src="{{ url('images/'. $post->main_image)  }}" alt="preview" class="w-100">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile">Выбрать файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>

                        @error('main_image')
                        <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <!-- select Category -->
                        <div class="form-group w-50">
                            <div class="text-bold">Категория</div>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)

                                    <option value="{{$category->id}}"

                                        {{ $category->id == old('category_id',$post->category_id) ? "selected" : "" }}
                                    >
                                        {{ $category->title }}

                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- select Tags -->
                        <div class="form-group w-50">
                            <div class="text-bold">Тэги</div>
                            <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Задайте тэг" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}"
                                        {{ in_array( $tag->id , old('tags',$post->tags->pluck('id')->toArray()) )  ? ' selected' : '' }}
                                    >{{$tag->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Изменить</button>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
@endsection
