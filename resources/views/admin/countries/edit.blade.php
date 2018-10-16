@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_country')
                <small>@lang('admin.it_edit_country_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('countries.index')}}"><i class="fa fa-flag"></i> @lang('admin.listing_countries')</a></li>
                <li class="active">@lang('admin.edit_country')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['countries.update', $country->id], 'method'=>'put', 'files' => true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_country')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.object_name')</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $country->name }}">
                            <p class="help-block">@lang('admin.country_format')</p>
                        </div>

                        <div class="form-group">
                            <label>@lang('column.language')</label>
                            {{ Form::select('language_id',
                                $language,
                                $country->language_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                        <div class="form-group">
                            <label>@lang('column.flag')</label>
                            {{ Form::select('image_id',
                                $flag_image,
                                $country->image_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                        <div class="form-group">
                            <label>@lang('column.id_documents')</label>
                            {{ Form::select('id_documents[]',
                                $id_documents,
                                $country->image_id,
                                ['class' => 'form-control select2', 'multiple'=>"multiple", 'data-placeholder'=>'Выберите документы подтверждающие личность'])
                            }}
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('countries.index')}}" class="btn btn-default">@lang('button.back')</a>
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