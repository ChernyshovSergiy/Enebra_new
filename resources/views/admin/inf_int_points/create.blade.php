@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.add_introduction_point')
                <small>@lang('admin.it_add_introduction_point_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('introduction_points.index')}}"><i class="fa fa-map-marker"></i> @lang('admin.listing_introduction_points')</a></li>
                <li class="active">@lang('admin.add_introduction_point')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'introduction_points.store']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.add_introduction_point')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.point'): {{$language}}</label>
                                <textarea name="{{'point'.':'.$language}}" id="" cols="80" rows="10" class="form-control">{{old('point'.':'.$language)}}</textarea>
                                <p class="help-block">@lang('admin.introduction_point_format')</p>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.link')</label>
                            {{ Form::select('link_id',
                               $page_names,
                               null,
                               ['class' => 'form-control select2'])
                            }}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.sort')</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('sort') }}">
                            <p class="help-block">@lang('admin.introduction_sort_format')</p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('introduction_points.index')}}" class="btn btn-default">@lang('button.back')</a>
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