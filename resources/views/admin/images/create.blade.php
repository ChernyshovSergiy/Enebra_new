@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Images
            <small>it add image here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('images.index')}}"><i class="fa fa-image"></i> Listing Images</a></li>
            <li class="active">Add Images</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'images.store', 'files' => true]) }}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем картинку</h3>
                @include('admin.error')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label>Категория</label>
                        {{ Form::select('category_id',
                            $image_categories,
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>

                    <div class="form-group">
                        <label>Автор</label>
                        {{ Form::select('user_id',
                            $users,
                            null,
                            ['class' => 'form-control select2'])
                        }}
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Картинка</label>
                        <input type="file" name="image" id="exampleInputFile">

                        <p class="help-block">Image format!!! ('jpg', 'jpeg', 'png', 'gif', 'bmp', or 'svg')
                            <br>Warning svg format mast be have specific header: <br>
                            {{ "<".'?xml version="1.0" encoding="UTF-8" standalone="no"?'.">" }}
                        </p>
                    </div>
                </div>
            </div>
             <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('images.index')}}" class="btn btn-default">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    {{ Form::close() }}
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection