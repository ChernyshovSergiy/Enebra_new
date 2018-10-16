@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('admin.add_video_collection_pages')
            <small>@lang('admin.it_add_video_pages_here')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
            <li><a href="{{route('video_collections.index')}}"><i class="fa fa-tv"> </i>@lang('admin.video_collection_pages')</a></li>
            <li class="active">@lang('admin.add_video_collection_pages')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            {!! Form::open(['route' => 'video_collections.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.add_video_collection_pages')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.object_name')</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.description')</label>
                            <textarea name="description" id="" cols="80" rows="10" class="form-control">{{old('description')}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.keywords')</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="keywords">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.meta_desc')</label>
                            <form>
                                <textarea id="" name="meta_desc" rows="10" cols="80">
                                    {{old('meta_desc')}}
                                </textarea>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="box-footer">
                <a href="{{route('video_collections.index')}}" class="btn btn-default">@lang('button.back')</a>
                <button class="btn btn-success pull-right">@lang('button.add')</button>
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
