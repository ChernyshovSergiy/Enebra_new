@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_video')
                <small>@lang('admin.it_edit_video_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('inf_videos.index')}}"><i class="fa fa-map-pin"></i> @lang('admin.listing_videos')</a></li>
                <li class="active">@lang('admin.edit_video')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['inf_videos.update', $video->id], 'method'=>'put', 'files'=>true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_video')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.object_name')</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video->title }}">
                            <p class="help-block">@lang('admin.format_video_name')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.description')</label>
                            <textarea name="description" id="" cols="80" rows="10" class="form-control">{{ $video->description }}</textarea>
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.about_author')</label>
                            <textarea name="about_author" id="" cols="80" rows="10" class="form-control">{{ $video->about_author }}</textarea>
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.link')</label>
                            <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video->link }}">
                            {{--<textarea name="link" id="" cols="80" rows="10" class="form-control">{{ $video->link }}</textarea>--}}
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.duration_time')</label>
                            <input type="text" name="duration_time" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video->duration_time }}">
                            <p class="help-block">@lang('admin.format_video_duration')</p>
                        </div>
                        <div class="form-group">
                            <label>@lang('column.video_group')</label>
                            {{ Form::select('video_group_id',
                                $video_group,
                                $video->video_group_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label>@lang('column.section')</label>
                            {{ Form::select('video_group_section_id',
                                $video_group_section,
                                $video->video_group_section_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label>@lang('column.image')</label>
                            {{ Form::select('image_id',
                                $image,
                                $video->image_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.sort')</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video->sort }}">
                            <p class="help-block">@lang('admin.introduction_sort_format')</p>
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
                    <a href="{{route('inf_videos.index')}}" class="btn btn-default">@lang('button.back')</a>
                    <button class="btn btn-warning pull-right">@lang('button.edit')</button>
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