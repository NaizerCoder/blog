@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить комментарий</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Изменить комментарий</li>
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

                    <form action="{{route('personal.comment.update',$comment->id)}}" method="POST" class="w-50">
                        @csrf
                        @method('patch')

                        <div class="form-group mb-3">
                            <textarea id="summernote" name="message">{{ old('comment',$comment->message) }}</textarea>
                        </div>

                        @error('message')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-success">Изменить</button>
                    </form>
                </div>

                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
@endsection
