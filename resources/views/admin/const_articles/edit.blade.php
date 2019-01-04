@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_article')
                <small>@lang('admin.it_edit_article_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('const_articles.index')}}"><i class="fa fa-gavel"></i> @lang('admin.listing_articles')</a></li>
                <li class="active">@lang('admin.edit_article')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['const_articles.update', $article->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_article')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.section')</label>
                            {{ Form::select('const_sections_id',
                                $section_names,
                                $article->const_sections_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.article'): {{$language}}</label>
                                <textarea name="{{'article'.':'.$language}}" id="" cols="80" rows="10" class="form-control">
                                    {{ $article->article ? $article->article->$language : ''}}</textarea>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.side')</label>
                            {{ Form::select('side',
                                [0 => Lang::get('app.left'), 1 => Lang::get('app.right')],
                                $article->side,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.sort')</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $article->sort }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('const_articles.index')}}" class="btn btn-default">@lang('button.back')</a>
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