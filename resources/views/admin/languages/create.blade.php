@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.add_languages')
                <small>@lang('admin.it_add_languages_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('languages.index')}}"><i class="fa fa-image"></i> @lang('admin.listing_languages')</a></li>
                <li class="active">@lang('admin.add_languages')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'languages.store', 'files' => true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.add_languages')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.slug')</label>
                            <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('slug') }}">
                            <p class="help-block">@lang('admin.slug_format')</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.name')</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('title') }}">
                            <p class="help-block">@lang('admin.name_format')</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.localization')</label>
                            <input type="text" name="localization" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('localization') }}">
                            <p class="help-block">@lang('admin.localization_format')</p>
                        </div>

                        <div class="form-group">
                            <label>@lang('column.flag')</label>
                            {{ Form::select('flag_image_id',
                                $flag_image,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('languages.index')}}" class="btn btn-default">@lang('button.back')</a>
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