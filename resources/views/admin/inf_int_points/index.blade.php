@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Listing Introduction Points
                <small>it all introduction points here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Introduction Points</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'introduction_points.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг динамических пунктов плана изучения проекта в Ведении</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('introduction_points.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Пункт</th>
                            <th>Ссылка</th>
                            <th>Порядковый номер</th>
                            <th>Язык</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inf_intr_points as $inf_intr_point)
                            <tr>
                                <td>{{ $inf_intr_point->id }}</td>
                                <td>{!! $inf_intr_point->point !!}</td>
                                <td>{{ $inf_intr_point->link }}</td>
                                <td>{{ $inf_intr_point->sort }}</td>
                                <td>{{ $inf_intr_point->getLanguage()}}</td>
                                <td>
                                    <a href="{{route('introduction_points.show', $inf_intr_point->id)}}" class="fa fa-eye"></a>
                                    <a href="{{route('introduction_points.edit', $inf_intr_point->id)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['introduction_points.destroy', $inf_intr_point->id], 'method'=>'delete']) }}
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