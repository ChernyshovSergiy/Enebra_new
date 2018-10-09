@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Listing Points of the Plan
                <small>it all plan points here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"> Points of the Plan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'inf_plan_phase_section_points.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг пунктов плана действий</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('inf_plan_phase_section_points.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Пункт</th>
                            <th>Описание</th>
                            <th>Фаза Плана</th>
                            <th>Секция</th>
                            <th>№ Сортировки</th>
                            <th>Язык</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plan_phase_section_points as $plan_phase_section_point)
                            <tr>
                                <td>{{ $plan_phase_section_point->id }}</td>
                                <td>{{ $plan_phase_section_point->point }}</td>
                                <td>{!! $plan_phase_section_point->description !!}</td>
                                <td>{{ $plan_phase_section_point->getPhase()}}</td>
                                <td>{{ $plan_phase_section_point->getSection()}}</td>
                                <td>{{ $plan_phase_section_point->sort }}</td>
                                <td>{{ $plan_phase_section_point->getLanguage()}}</td>
                                <td>
                                    <a href="{{route('inf_plan_phase_section_points.show', $plan_phase_section_point->id)}}" class="fa fa-eye"></a>
                                    <a href="{{route('inf_plan_phase_section_points.edit', $plan_phase_section_point->id)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['inf_plan_phase_section_points.destroy', $plan_phase_section_point->id], 'method'=>'delete']) }}
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    <!-- Button trigger modal -->
                                    {{--<button type="button" class="delete" data-toggle="modal" data-target="#modal-default">--}}
                                        {{--<i class="fa fa-remove"></i>--}}
                                    {{--</button>--}}
                                    {{--<div class="modal fade" id="modal-default">--}}
                                        {{--<div class="modal-dialog">--}}
                                            {{--<div class="modal-content">--}}
                                                {{--<div class="modal-header">--}}
                                                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                                        {{--<span aria-hidden="true">&times;</span></button>--}}
                                                    {{--<h4 class="modal-title">Are you wont to delete this entry</h4>--}}
                                                {{--</div>--}}
                                                {{--<div class="modal-body">--}}
                                                    {{--<p>Are you sure?&hellip;</p>--}}
                                                {{--</div>--}}
                                                {{--<div class="modal-footer">--}}
                                                    {{--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>--}}
                                                    {{--<button type="submit" class="btn btn-primary">Delete</button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<!-- /.modal-content -->--}}
                                        {{--</div>--}}
                                        {{--<!-- /.modal-dialog -->--}}
                                    {{--</div>--}}
                                    {{--<!-- /.modal -->--}}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection