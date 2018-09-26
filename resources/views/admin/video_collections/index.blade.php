@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Video Collections Pages
            <small>it all pages with video information's</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Video Collections</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    {{ Form::open([
        'route' => 'video_collections.store',
        'files' => true
    ])}}

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Листинг Видео Коллекций</h3>
                @include('admin.error')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('video_collections.create')}}" class="btn btn-success">Добавить коллекцию</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Ключевые Слова</th>
                            <th>Мета Описание</th>
                            <th>Мета ID</th>
                            <th>Language</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($inf_video_groups as $key => $inf_video_group)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$inf_video_group->title}}</td>
                            <td>{!! str_limit($inf_video_group->description, 200) !!}</td>
                            <td>{{$inf_video_group->keywords}}</td>
                            <td>{{ str_limit($inf_video_group->meta_desc, 20) }} </td>
                            <td>{{$inf_video_group->meta_id}}</td>
                            <td>{{isset($inf_video_group->language_id->title) ? $inf_video_group->language_id->title : '' }}</td>

                            <td>
                                <a href="{{route('video_collections.show', $inf_video_group->id)}}" class="fa fa-eye"></a>
                                <a href="{{route('video_collections.edit', $inf_video_group->id)}}" class="fa fa-pencil"></a>
                                {{ Form::open(['route'=>['video_collections.destroy', $inf_video_group->id], 'method'=>'delete']) }}
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
    {{ Form::close() }}
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection