@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Listing Countries
                <small>it all countries here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Countries</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'countries.store',
            'files' => true
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг стран</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('countries.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Язык</th>
                            <th>Флаг</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($countries as $country)
                            <tr>
                                <td>{{ $country->id }}</td>
                                <td>{{ $country->name }}</td>
                                <td>{{ $country->getLanguage()}}</td>
                                <td>
                                    <img src="{{ $country->getFlagImage() }}" alt="" width="30">
                                <td>
                                    <a href="{{route('countries.show', $country->id)}}" class="fa fa-eye"></a>
                                    <a href="{{route('countries.edit', $country->id)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['countries.destroy', $country->id], 'method'=>'delete']) }}
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