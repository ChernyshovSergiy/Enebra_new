@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Point to Plan
                <small>it add point to plan here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('inf_plan_phase_section_points.index')}}"><i class="fa fa-map-pin"></i> Listing Plan Points</a></li>
                <li class="active">Add Point to Plan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'inf_plan_phase_section_points.store']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем пункт плана действий</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пункт</label>
                            <input type="text" name="point" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('point') }}">
                            <p class="help-block">Name format!!! -> Создание и запуск сайта enebra.org</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="" cols="80" rows="10" class="form-control">{{old('description')}}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>
                        <div class="form-group">
                            <label>Фаза</label>
                            {{ Form::select('phase_id',
                                $phase,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label>Секция</label>
                            {{ Form::select('section_id',
                                $section,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">№ Сортировки</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('sort') }}">
                            <p class="help-block">Name format!!! -> 1</p>
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
                    <a href="{{route('inf_plan_phase_section_points.index')}}" class="btn btn-default">Назад</a>
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