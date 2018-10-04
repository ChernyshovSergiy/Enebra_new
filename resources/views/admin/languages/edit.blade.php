@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Language
                <small>it edit language here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('languages.index')}}"><i class="fa fa-image"></i> Listing Languages</a></li>
                <li class="active">Edit Language</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['languages.update', $language->id], 'method'=>'put', 'files' => true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменяем язык</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Слаг</label>
                            <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $language->slug }}">
                            <p class="help-block">Slug format!!! -> uk</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $language->title }}">
                            <p class="help-block">Name format!!! -> Український</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Локализация</label>
                            <input type="text" name="localization" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $language->localization }}">
                            <p class="help-block">localization format!!! -> uk-UA</p>
                        </div>

                        <div class="form-group">
                            <label>Флаг</label>
                            {{ Form::select('flag_image_id',
                                $flag_image,
                                $language->flag_image_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('languages.index')}}" class="btn btn-default">Назад</a>
                    <button class="btn btn-warning pull-right">Изменить</button>
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