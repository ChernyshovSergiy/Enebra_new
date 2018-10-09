@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add new Video Group
                <small>it add video group here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('inf_video_groups.index')}}"><i class="fa fa-file-text"></i> Listing Video Groups</a></li>
                <li class="active">Add Video Group</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'inf_video_groups.store']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем видео группу</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('title') }}">
                            {{--<p class="help-block">Name format!!! -> Паспорт</p>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Слаг</label>
                            <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('slug') }}">
                            {{--<p class="help-block">Name format!!! -> Паспорт</p>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="" cols="80" rows="10" class="form-control">{{old('description')}}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ключевые слова</label>
                            <input type="text" name="keywords" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('keywords') }}">
                            <p class="help-block">Name format!!! -> blockchain, hash sum, nature, movie</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Мета Описание</label>
                            <textarea name="meta_desc" id="" cols="80" rows="10" class="form-control">{{old('meta_desc')}}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label>Язык</label>
                            {{ Form::select('language_id',
                                $language,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_video_groups.index')}}" class="btn btn-default">Назад</a>
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