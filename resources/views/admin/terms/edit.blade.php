@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_term')
                <small>@lang('admin.it_edit_term_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('terms.index')}}"><i class="fa fa-file-text-o"></i> @lang('admin.listing_terms')</a></li>
                <li class="active">@lang('admin.edit_term')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['terms.update', $terms->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_term')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        @foreach($text_blocks as $block)
                            @foreach($languages as $language)
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                    <textarea name="{{ $block.':'.$language}}" id="{{ $block.':'.$language}}" cols="80" rows="10" class="form-control" title="{{ $block.':'.$language}}"
                                    >{!! $terms->content ? $terms->content->$block->$language : '' !!}</textarea>
                                </div>
                            @endforeach
                        @endforeach
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.views_count')</label>
                            <input type="text" name="views_count" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $terms->views_count }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('terms.index')}}" class="btn btn-default">@lang('button.back')</a>
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