@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.add_video_group')
                <small>@lang('admin.it_add_video_group_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('inf_video_groups.index')}}"><i class="fa fa-file-text"></i> @lang('admin.listing_video_groups')</a></li>
                <li class="active">@lang('admin.add_video_group')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'inf_video_groups.store']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.add_video_group')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.object_name')</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.slug')</label>
                            <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('slug') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.description')</label>
                            <textarea name="description" id="" cols="80" rows="10" class="form-control">{{old('description')}}</textarea>
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.keywords')</label>
                            <input type="text" name="keywords" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('keywords') }}">
                            <p class="help-block">@lang('admin.format_keywords')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.meta_desc')</label>
                            <textarea name="meta_desc" id="" cols="80" rows="10" class="form-control">{{old('meta_desc')}}</textarea>
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label>@lang('column.language')</label>
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
                    <a href="{{route('inf_video_groups.index')}}" class="btn btn-default">@lang('button.back')</a>
                    <button class="btn btn-success pull-right">@lang('button.add')</button>
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