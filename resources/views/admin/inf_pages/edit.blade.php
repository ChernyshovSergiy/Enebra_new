@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_page')
                <small>@lang('admin.it_edit_page_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('inf_pages.index')}}"><i class="fa fa-newspaper-o"></i> @lang('admin.listing_pages')</a></li>
                <li class="active">@lang('admin.edit_page')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['inf_pages.update', $page->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_page')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('column.user')</label>
                            {{ Form::select('user_id',
                                $users,
                                $page->user_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label>@lang('column.title')</label>
                            {{ Form::select('title_id',
                                $page_names,
                                $page->title_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        @foreach($text_blocks as $block)
                            @foreach($languages as $language)
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                    <textarea name="{{ $block.':'.$language}}" id="{{ $block.':'.$language}}" cols="80" rows="10" class="form-control" title="{{ $block.':'.$language}}"
                                    >{!! $page->text->$block->$language !!}</textarea>
                                </div>
                            @endforeach
                        @endforeach
                        <div class="form-group">
                            <label>@lang('column.image')</label>
                            {{ Form::select('image_id',
                                $images,
                                $page->image_id,
                                [ 'class' => 'form-control select2',
                                    'placeholder' => Lang::get('admin.select_image')])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.menu')</label>
                            <input type="text" name="menu" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $page->menu }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.if_desc')</label>
                            <input type="text" name="if_desc" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $page->if_desc }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.sort')</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $page->sort }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('column.original')</label>
                            {{ Form::select('original',
                                $languages,
                                $page->original,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.meta_id')</label>
                            <input type="text" name="meta_id" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $page->meta_id }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_pages.index')}}" class="btn btn-default">@lang('button.back')</a>
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