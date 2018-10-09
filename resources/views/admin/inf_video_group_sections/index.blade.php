@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Listing Video Group Sections
                <small>it all video group sections here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Video Group Sections</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
        'route' => 'inf_video_group_sections.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг секций для видео групп</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('inf_video_group_sections.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Видео группа</th>
                            <th>Язык</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($video_group_sections as $video_group_section)
                            <tr>
                                <td>{{ $video_group_section->id }}</td>
                                <td>{{ $video_group_section->title }}</td>
                                <td>{{ $video_group_section->getVideoGroup() }}</td>
                                <td>{{ $video_group_section->getLanguage()}}</td>
                                <td>
                                    <a href="{{route('inf_video_group_sections.show', $video_group_section->id)}}" class="fa fa-eye"></a>
                                    <a href="{{route('inf_video_group_sections.edit', $video_group_section->id)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['inf_video_group_sections.destroy', $video_group_section->id], 'method'=>'delete']) }}
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