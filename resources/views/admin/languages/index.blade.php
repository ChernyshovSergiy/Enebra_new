@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Listing Languages
                <small>it all languages here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Languages</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'languages.store',
            'files' => true
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг языков</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('languages.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Слаг</th>
                            <th>Название</th>
                            <th>Локализация</th>
                            <th>Флаг</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $language)
                            <tr>
                                <td>{{ $language->id }}</td>
                                <td>{{ $language->slug }}</td>
                                <td>{{ $language->title }}</td>
                                <td>{{ $language->localization }}</td>
                                <td>
                                    <img src="{{ $language->getFlagImage() }}" alt="" width="30">
                                <td>
                                    <a href="{{route('languages.show', $language->id)}}" class="fa fa-eye"></a>
                                    <a href="{{route('languages.edit', $language->id)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['languages.destroy', $language->id], 'method'=>'delete']) }}
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