@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_plan_phase')
                <small>@lang('admin.the_edit_plan_phase_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('inf_plan_phases.index')}}"><i class="fa fa-qrcode"></i> @lang('admin.listing_plan_phases')</a></li>
                <li class="active">@lang('admin.edit_plan_phase')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['inf_plan_phases.update', $plan_phase->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_plan_phase')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.object_name')</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $plan_phase->title }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('column.language')</label>
                            {{ Form::select('language_id',
                                $language,
                                $plan_phase->language_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_plan_phases.index')}}" class="btn btn-default">@lang('button.back')</a>
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