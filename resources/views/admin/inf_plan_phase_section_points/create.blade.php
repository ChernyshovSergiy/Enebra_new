@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.add_plan_phase_sec_point')
                <small>@lang('admin.the_add_plan_phase_sec_point_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('inf_plan_phase_section_points.index')}}"><i class="fa fa-map-pin"></i> @lang('admin.listing_plan_phases_sec_point')</a></li>
                <li class="active">@lang('admin.add_plan_phase_sec_point')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'inf_plan_phase_section_points.store']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.add_plan_phase_sec_point')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="is_done">
                            </label>
                            <label>
                                @lang('column.done')
                            </label>
                        </div>
                        @foreach($text_blocks as $block)
                            @foreach($languages as $language)
                                @if($block === 'point')
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                        <input type="text" name="{{ $block.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old( $block.':'.$language)}}">
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> @lang('column'.'.'.$block): {{$language}}</label>
                                        <textarea name="{{ $block.':'.$language}}" id="{{ $block.':'.$language}}" cols="80" rows="10" class="form-control" title="{{ $block.':'.$language}}">{{old( $block.':'.$language)}}</textarea>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                        <div class="form-group">
                            <label>@lang('column.phase')</label>
                            {{ Form::select('phase_id',
                                $phase,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label>@lang('column.section')</label>
                            {{ Form::select('section_id',
                                $section,
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
                    <a href="{{route('inf_plan_phase_section_points.index')}}" class="btn btn-default">@lang('button.back')</a>
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