@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_video_group')
                <small>@lang('admin.it_edit_video_group_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('inf_video_groups.index')}}"><i class="fa fa-file-text"></i> @lang('admin.listing_video_groups')</a></li>
                <li class="active">@lang('admin.edit_video_group')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['inf_video_groups.update', $video_group->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_video_group')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.object_name')</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video_group->title }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.slug')</label>
                            <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video_group->slug }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.description')</label>
                            <textarea name="description" id="" cols="80" rows="10" class="form-control">{{ $video_group->description }}</textarea>
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.keywords')</label>
                            <input type="text" name="keywords" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $video_group->keywords }}">
                            <p class="help-block">@lang('admin.format_keywords')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.meta_desc')</label>
                            <textarea name="meta_desc" id="" cols="80" rows="10" class="form-control">{{ $video_group->meta_desc }}</textarea>
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label>@lang('column.language')</label>
                            {{ Form::select('language_id',
                                $language,
                                $video_group->language_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_video_groups.index')}}" class="btn btn-default">@lang('button.back')</a>
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