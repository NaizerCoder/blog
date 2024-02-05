@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить пост</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                <div class="row">

                    <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Название поста">
                        </div>
                            @error('title')
                                <div class="text-danger mb-3">{{ $message }}</div>
                            @enderror

                        <div class="form-group" class="w-25">
                            <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                        </div>
                            @error('content')
                                <div class="text-danger mb-3">{{ $message }}</div>
                            @enderror

                        <div class="form-group w-25">
                            <div class="text-bold">Превью</div>
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


                        <div class="form-group w-25">
                            <div class="text-bold">Главное изображение</div>
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

                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group w-25">
                                <label>Категория</label>
                                <select class="form-select">
                                    @foreach($categories as $category)

                                        <option value="{{$category->id}}">{{$category->title}}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                </div>

                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
@endsection
