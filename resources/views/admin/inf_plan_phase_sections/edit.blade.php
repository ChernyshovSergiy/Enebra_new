@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_plan_phase_sec')
                <small>@lang('admin.the_edit_plan_phase_sec_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('inf_plan_phase_sections.index')}}"><i class="fa fa-map-signs"></i> @lang('admin.listing_plan_phases_sec')</a></li>
                <li class="active">@lang('admin.edit_plan_phase_sec')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['inf_plan_phase_sections.update', $plan_phase_section->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_plan_phase_sec')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.object_name'): {{$language}}</label>
                                <input type="text" name="{{'sub_title'.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder=""
                                       value="{{ $plan_phase_section->sub_title ? $plan_phase_section->sub_title->$language : '' }}" >
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_plan_phase_sections.index')}}" class="btn btn-default">@lang('button.back')</a>
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