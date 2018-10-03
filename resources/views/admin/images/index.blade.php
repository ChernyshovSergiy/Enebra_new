@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Listing Images
                <small>it all images here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Images</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'images.store',
            'files' => true
        ]) }}
            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг картинок</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('images.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Автор</th>
                                <th>Картинка</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                            <tr>
                                <td>{{ $image->id }}</td>
                                <td>{{ $image->title }}</td>
                                <td>{{ $image->getCategoryIdTitle() }}</td>
                                <td>{{isset($image->user_id) ? $image->user_id : ''}}</td>
                                <td>
                                    <img src="{{ $image->getImage() }}" alt="" width="30">
                                <td>
                                    <a href="{{route('images.show', $image->id)}}" class="fa fa-eye"></a>
                                    <a href="{{route('images.edit', $image->id)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['images.destroy', $image->id], 'method'=>'delete']) }}
                                        <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection