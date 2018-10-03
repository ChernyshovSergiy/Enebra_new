@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Language
                <small>it add language here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('languages.index')}}"><i class="fa fa-image"></i> Listing Languages</a></li>
                <li class="active">Add Language</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'languages.store', 'files' => true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем язык</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Слаг</label>
                            <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('slug') }}">
                            <p class="help-block">Slug format!!! -> uk</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('title') }}">
                            <p class="help-block">Name format!!! -> Український</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Локализация</label>
                            <input type="text" name="localization" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('localization') }}">
                            <p class="help-block">localization format!!! -> uk-UA</p>
                        </div>

                        <div class="form-group">
                            <label>Флаг</label>
                            {{ Form::select('flag_image_id',
                                $flag_image,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('languages.index')}}" class="btn btn-default">Назад</a>
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