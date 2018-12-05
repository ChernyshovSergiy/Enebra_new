@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_social_link')
                <small>@lang('admin.it_edit_social_link_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('social_links.index')}}"><i class="fa fa-share-alt"></i> @lang('admin.listing_social_links')</a></li>
                <li class="active">@lang('admin.edit_social_link')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['social_links.update', $social_link->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_social_link')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.object_name')</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $social_link->name }}">
                        </div>

                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.url'): {{$language}}</label>
                                <input type="text" name="{{'url'.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder=""
                                       value="{{ $social_link->url ? $social_link->url->$language : ''}}">
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.sort')</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $social_link->sort }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('column.image_id')</label>
                            {{ Form::select('image_id',
                                $foot_icon_image,
                                $social_link->image_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('social_links.index')}}" class="btn btn-default">@lang('button.back')</a>
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