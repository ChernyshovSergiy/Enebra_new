@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_language')
                <small>@lang('admin.it_edit_language_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('languages.index')}}"><i class="fa fa-image"></i> @lang('admin.listing_language')</a></li>
                <li class="active">@lang('admin.edit_language')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['languages.update', $language->id], 'method'=>'put', 'files' => true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_language')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.slug')</label>
                            <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $language->slug }}">
                            <p class="help-block">@lang('admin.slug_format')</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.name')</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $language->title }}">
                            <p class="help-block">@lang('admin.name_format')</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.localization')</label>
                            <input type="text" name="localization" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $language->localization }}">
                            <p class="help-block">@lang('admin.localization_format')</p>
                        </div>

                        <div class="form-group">
                            <label>@lang('column.flag')</label>
                            {{ Form::select('flag_image_id',
                                $flag_image,
                                $language->flag_image_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('languages.index')}}" class="btn btn-default">@lang('button.back')</a>
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