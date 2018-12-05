@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_video_collection_pages')
                <small>@lang('admin.it_edit_video_pages_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('video_collections.index')}}"><i class="fa fa-tv"> </i> @lang('admin.video_collection_pages')</a></li>
                <li class="active">@lang('admin.edit_video_collection_pages')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_video_collection_pages')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    {{ Form::open(['route'=>['video_collections.update', $inf_video_group->id], 'method'=>'put'])}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.object_name')</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="" value="{{$inf_video_group->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.description')</label>
                            <textarea name="description" id="" cols="80" rows="10" class="form-control">
                                {{$inf_video_group->description}}
                            </textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('video_collections.index')}}" class="btn btn-default">@lang('button.back')</a>
                    <button class="btn btn-warning pull-right">@lang('button.edit')</button>
                </div>
            {{ Form::close() }}
            <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection