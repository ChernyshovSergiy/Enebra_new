@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Video
                <small>it edit video here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('inf_videos.index')}}"><i class="fa fa-map-pin"></i> Listing Videos</a></li>
                <li class="active">Edit Video</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['inf_videos.update', $video->id], 'method'=>'put', 'files'=>true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменяем направление в этапе плана действий</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video->title }}">
                            <p class="help-block">Name format!!! -> Home</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="" cols="80" rows="10" class="form-control">{{ $video->description }}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Об Авторах</label>
                            <textarea name="about_author" id="" cols="80" rows="10" class="form-control">{{ $video->about_author }}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ссылка</label>
                            <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video->link }}">
                            {{--<textarea name="link" id="" cols="80" rows="10" class="form-control">{{ $video->link }}</textarea>--}}
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Продолжительность</label>
                            <input type="text" name="duration_time" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video->duration_time }}">
                            <p class="help-block">Name format!!! -> Home</p>
                        </div>
                        <div class="form-group">
                            <label>Видео Группа</label>
                            {{ Form::select('video_group_id',
                                $video_group,
                                $video->video_group_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label>Секция</label>
                            {{ Form::select('video_group_section_id',
                                $video_group_section,
                                $video->video_group_section_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label>Картинка</label>
                            {{ Form::select('image_id',
                                $image,
                                $video->image_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Сортировка</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video->sort }}">
                            <p class="help-block">Name format!!! -> 1</p>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label>Язык</label>--}}
                            {{--{{ Form::select('language_id',--}}
                                {{--$language,--}}
                                {{--$video->language_id,--}}
                                {{--['class' => 'form-control select2'])--}}
                            {{--}}--}}
                        {{--</div>--}}
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_videos.index')}}" class="btn btn-default">Назад</a>
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