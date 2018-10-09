@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Listing Phase Sections of Plan
                <small>it all plan phase sections here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"> Phase Sections of Plan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'inf_plan_phases.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг этапов плана действий</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('inf_plan_phase_sections.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Язык</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plan_phase_sections as $plan_phase_section)
                            <tr>
                                <td>{{ $plan_phase_section->id }}</td>
                                <td>{{ $plan_phase_section->sub_title }}</td>
                                <td>{{ $plan_phase_section->getLanguage()}}</td>
                                <td>
                                    <a href="{{route('inf_plan_phase_sections.show', $plan_phase_section->id)}}" class="fa fa-eye"></a>
                                    <a href="{{route('inf_plan_phase_sections.edit', $plan_phase_section->id)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['inf_plan_phase_sections.destroy', $plan_phase_section->id], 'method'=>'delete']) }}
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>
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