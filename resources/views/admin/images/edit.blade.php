@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_image')
                <small>@lang('admin.it_edit_image_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('images.index')}}"><i class="fa fa-image"></i> @lang('admin.listing_images')</a></li>
                <li class="active">@lang('admin.edit_image')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['images.update', $image->id], 'method'=>'put', 'files'=>true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_image')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.name')</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $image->title }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('column.category')</label>
                            {{ Form::select('category_id',
                                $image_categories,
                                $image->category_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                        <div class="form-group">
                            <label>@lang('column.author')</label>
                            {{ Form::select('user_id',
                                $users,
                                $image->getUserIdName(),
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                        <div class="form-group">
                            <img src="{{ $image->getImage() }}" alt="" width="200" class="img-responsive">
                            <label for="exampleInputFile">@lang('column.image')</label>
                            <input type="file" name="image" id="exampleInputFile" value="{{ $image->image }}">

                            <p class="help-block">@lang('admin.image_format')
                                <br>@lang('admin.warning_svg')<br>
                                {{ "<".'?xml version="1.0" encoding="UTF-8" standalone="no"?'.">" }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('images.index')}}" class="btn btn-default">@lang('button.back')</a>
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