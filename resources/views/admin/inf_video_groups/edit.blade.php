@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_video_group')
                <small>@lang('admin.it_edit_video_group_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('inf_video_groups.index')}}"><i class="fa fa-file-text"></i> @lang('admin.listing_video_groups')</a></li>
                <li class="active">@lang('admin.edit_video_group')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['inf_video_groups.update', $video_group->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_video_group')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('column.object_name')</label>
                            {{ Form::select('menu_id',
                                $menus,
                                $video_group->menu_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        @foreach($text_blocks as $block)
                            @foreach($languages as $language)
                                @if($block === 'keywords')
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                        <input type="text" name="{{ $block.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder=""
                                               value="{!! $video_group->content ? $video_group->content->$block->$language : '' !!}">
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                        <textarea name="{{ $block.':'.$language}}" id="{{ $block.':'.$language}}" cols="80" rows="10" class="form-control" title="{{ $block.':'.$language}}">
                                            {!! $video_group->content ? $video_group->content->$block->$language : '' !!}</textarea>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_video_groups.index')}}" class="btn btn-default">@lang('button.back')</a>
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