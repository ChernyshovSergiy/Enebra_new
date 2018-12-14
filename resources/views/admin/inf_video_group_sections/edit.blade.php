@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_video_group_section')
                <small>@lang('admin.it_edit_video_group_section_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('inf_video_group_sections.index')}}"><i class="fa fa-file-text"></i> @lang('admin.listing_video_group_sections')</a></li>
                <li class="active">@lang('admin.edit_video_group_section')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['inf_video_group_sections.update', $video_group_section->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_video_group_section')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.object_name'): {{$language}}</label>
                                <input type="text" name="{{'title'.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder=""
                                       value="{{ $video_group_section->title ? $video_group_section->title->$language : '' }}" >
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label>@lang('column.video_group')</label>
                            {{ Form::select('video_group_id',
                                $video_group,
                                json_decode($video_group_section->video_group->menu->title)->$locale,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_video_group_sections.index')}}" class="btn btn-default">@lang('button.back')</a>
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