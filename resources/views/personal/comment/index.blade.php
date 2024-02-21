@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарии</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Комментарии</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-7">
                        <div class="card">
                            <div class="card-body table-responsive p-0">

                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Комментарий</th>
                                        <th>Пост</th>
                                        <td colspan="2" class="text-center">Действия</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{$comment->message}}</td>
                                            <td>{{$comment->post->title}}</td>
                                            <td>
                                                <!-- Edit -->
                                                <a href="{{route('personal.comment.edit',$comment->id)}}" <i
                                                    class="fas fa-pencil-alt text-success"></i></a>
                                            </td>
                                            <td>
                                                <!-- Delete -->
                                                <div>
                                                    <form action="{{ route('personal.comment.delete',$comment->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type='submit' class="fas fa-trash-alt border-0 bg-transparent text-danger"></button>

                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                    <!-- /.row -->
                </div>

            </div>

        </section>

        <!-- /.content -->
    </div>
@endsection
