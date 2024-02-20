@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Лайки</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Лайки</li>
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
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Пост</th>
                                        <td colspan="3" class="text-center">Действия</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($likePosts as $likePost)
                                        <tr>
                                            <td>{{$likePost->id}}</td>
                                            <td>{{$likePost->title}}</td>
                                            <td><a href="{{route('personal.like.show',$likePost->id)}}" <i class="far fa-file-alt"></i></a></td>

                                            <td>

                                                <div>
                                                    <form action="{{ route('personal.like.delete',$likePost->id) }}"
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
