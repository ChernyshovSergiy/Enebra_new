@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Listing Video Groups
                <small>it all video groups here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Video Groups</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
        'route' => 'inf_video_groups.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг видео групп</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('inf_video_groups.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Слаг</th>
                            <th>Описание</th>
                            <th>Ключевые слова</th>
                            <th>Мета Описание</th>
                            <th>Язык</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($video_groups as $video_group)
                            <tr>
                                <td>{{ $video_group->id }}</td>
                                <td>{{ $video_group->title }}</td>
                                <td>{{ $video_group->slug }}</td>
                                <td>{!! $video_group->description !!}</td>
                                <td>{{ $video_group->keywords }}</td>
                                <td>{!! $video_group->meta_desc !!}</td>
                                <td>{{ $video_group->getLanguage()}}</td>
                                <td>
                                    <a href="{{route('inf_video_groups.show', $video_group->id)}}" class="fa fa-eye"></a>
                                    <a href="{{route('inf_video_groups.edit', $video_group->id)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['inf_video_groups.destroy', $video_group->id], 'method'=>'delete']) }}
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