@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Phase Section to Plan
                <small>it add phase section to plan here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('inf_plan_phase_sections.index')}}"><i class="fa fa-map-signs"></i> Listing Plan Phase Sections</a></li>
                <li class="active">Add Phase Section</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'inf_plan_phase_sections.store']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем направление в этап плана действий</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="sub_title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('sub_title') }}">
                            {{--<p class="help-block">Name format!!! -> Паспорт</p>--}}
                        </div>

                        <div class="form-group">
                            <label>Язык</label>
                            {{ Form::select('language_id',
                                $language,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_plan_phase_sections.index')}}" class="btn btn-default">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
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