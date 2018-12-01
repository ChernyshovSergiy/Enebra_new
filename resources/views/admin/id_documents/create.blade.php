@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.add_id_document')
                <small>@lang('admin.it_add_id_document_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('id_documents.index')}}"><i class="fa fa-newspaper-o"></i> @lang('admin.listing_id_documents')</a></li>
                <li class="active">@lang('admin.add_id_document')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'id_documents.store']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.add_id_document')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.object_name'): {{$language}}</label>
                                <input type="text" name="{{'name'.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('name'.':'.$language) }}">
                                {{--<p class="help-block">@lang('admin.doc_format')</p>--}}
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('id_documents.index')}}" class="btn btn-default">@lang('button.back')</a>
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