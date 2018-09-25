@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create New Video Collection Page
            <small>new video group</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('video_collections.index')}}">Video Collections</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            {!! Form::open(['route' => 'video_collections.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем новую видео-группу</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="" cols="80" rows="10" class="form-control">{{old('description')}}</textarea>
                        </div>
                    </div>

                    {{--<div class="col-md-12">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Ключевые слова</label>--}}
                            {{--<input type="text" class="form-control" id="exampleInputEmail1" placeholder="">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Мета описание для поисковых роботов</label>--}}
                            {{--<form>--}}
                                {{--<textarea id="" name="meta_desc" rows="10" cols="80">--}}
                                                        {{--Описание для поисковых роботов.--}}
                                {{--</textarea>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
            </div>
            <div class="box-footer">
                <a href="{{route('video_collections.index')}}" class="btn btn-default">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {!! Form::close() !!}
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
