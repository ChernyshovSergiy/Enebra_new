@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Introduction
                <small>The edit Introduction here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('introductions.index')}}"><i class="fa fa-info-circle"></i> Listing Introductions</a></li>
                <li class="active">Edit Introduction</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['introductions.update', $introduction->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменяем Раздел Ведение для домашней страницы</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Заголовок</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $introduction->title }}">
                            <p class="help-block">Name format!!! -> introductions</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Подзаголовок</label>
                            <textarea name="sub_title" id="" cols="80" rows="10" class="form-control">{{ $introduction->sub_title }}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Основной текст</label>
                            <textarea name="text" id="" cols="80" rows="10" class="form-control">{{ $introduction->text }}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Цитата</label>
                            <textarea name="replica" id="" cols="80" rows="10" class="form-control">{{ $introduction->replica }}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Заключение</label>
                            <textarea name="conclusion" id="" cols="80" rows="10" class="form-control">{{ $introduction->conclusion }}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label>Язык</label>
                            {{ Form::select('language_id',
                                $language,
                                $introduction->language_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('introductions.index')}}" class="btn btn-default">Назад</a>
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