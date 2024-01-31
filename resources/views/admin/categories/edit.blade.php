@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить категорию</h1>
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

                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST" class="w-25">
                        @csrf
                        @method('patch')

                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Название категории" value="{{$category->title}}">
                        </div>

                        @error('title')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-success">Добавить</button>
                    </form>
                </div>

                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
@endsection
