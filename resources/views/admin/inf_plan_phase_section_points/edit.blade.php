@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Point in the Plan
                <small>it edit point in active plan here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('inf_plan_phase_section_points.index')}}"><i class="fa fa-map-pin"></i> Listing Plan Points</a></li>
                <li class="active">Edit Point in the Plan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['inf_plan_phase_section_points.update', $plan_phase_section_point->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменяем направление в этапе плана действий</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пункт</label>
                            <input type="text" name="point" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $plan_phase_section_point->point }}">
                            <p class="help-block">Name format!!! -> Создание и запуск сайта enebra.org</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="" cols="80" rows="10" class="form-control">{{ $plan_phase_section_point->description }}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label>Фаза</label>
                            {{ Form::select('phase_id',
                                $phase,
                                $plan_phase_section_point->phase_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label>Секция</label>
                            {{ Form::select('section_id',
                                $section,
                                $plan_phase_section_point->section_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">№ Сортировки</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $plan_phase_section_point->sort }}">
                            <p class="help-block">Name format!!! -> 1</p>
                        </div>
                        <div class="form-group">
                            <label>Язык</label>
                            {{ Form::select('language_id',
                                $language,
                                $plan_phase_section_point->language_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('inf_plan_phase_section_points.index')}}" class="btn btn-default">Назад</a>
                    <button class="btn btn-warning pull-right">Изменить</button>
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