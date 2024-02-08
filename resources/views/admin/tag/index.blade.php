@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Тэги</h1>
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
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <td colspan="3" class="text-center">Действия</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{$tag->id}}</td>
                                            <td>{{$tag->title}}</td>
                                            <td><a href="{{route('admin.tag.show',$tag->id)}}" <i class="far fa-file-alt"></i></a></td>
                                            <td><a href="{{route('admin.tag.edit',$tag->id)}}" <i class="fas fa-pencil-alt text-success"></i></a></td>
                                            <td>

                                                <div>
                                                    <form action="{{ route('admin.tag.delete',$tag->id) }}"
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
                <div class="row">
                    <div class="col-1 mb-3">
                        <a href="{{route('admin.tag.create')}}"
                           class="btn btn-block btn-outline-primary">Добавить</a>
                    </div>
                </div>
            </div>

        </section>

        <!-- /.content -->
    </div>
@endsection
