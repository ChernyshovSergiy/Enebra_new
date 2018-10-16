@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_introduction')
                <small>@lang('admin.the_edit_introduction_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('introductions.index')}}"><i class="fa fa-info-circle"></i> @lang('admin.listing_introduction')</a></li>
                <li class="active">@lang('admin.edit_introduction')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['introductions.update', $introduction->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_introduction')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.title')</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $introduction->title }}">
                            <p class="help-block">@lang('admin.introduction_format')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.sub_title')</label>
                            <textarea name="sub_title" id="" cols="80" rows="10" class="form-control">{{ $introduction->sub_title }}</textarea>
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.text')</label>
                            <textarea name="text" id="" cols="80" rows="10" class="form-control">{{ $introduction->text }}</textarea>
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.replica')</label>
                            <textarea name="replica" id="" cols="80" rows="10" class="form-control">{{ $introduction->replica }}</textarea>
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.conclusion')</label>
                            <textarea name="conclusion" id="" cols="80" rows="10" class="form-control">{{ $introduction->conclusion }}</textarea>
                            <p class="help-block">@lang('admin.introduction_text_format')</p>
                        </div>
                        <div class="form-group">
                            <label>@lang('column.language')</label>
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
                    <a href="{{route('introductions.index')}}" class="btn btn-default">@lang('button.back')</a>
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