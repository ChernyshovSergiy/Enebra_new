@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Video Collections Pages
                <small>it all pages with video informations</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                {{--<li><a href="#">Video Collections</a></li>--}}
                <li class="active">Video Collections</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг Видео Коллекций</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('adminvideo_collections.create') }}" class="btn btn-success">Добавить коллекцию</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Kлючевые Cлова</th>
                            <th>Мета Описание</th>
                            <th>Мета ID</th>
                            <th>Language</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inf_video_groups as $inf_video_group)
                            <tr>
                                <td>{{$inf_video_group->id}}</td>
                                <td>{{$inf_video_group->title}}</td>
                                <td>{{$inf_video_group->description}}</td>
                                <td>{{$inf_video_group->keywords}}</td>
                                <td>{{ str_limit($inf_video_group->meta_desc, 20) }} </td>
                                <td>{{$inf_video_group->meta_id}}</td>
                                <td>{{$inf_video_group->language_id->title}}</td>
                                <td><a href="edit.html" class="fa fa-pencil"></a> <a href="#" class="fa fa-remove"></a></td>
                            </tr>
                        @endforeach

                        <tr>
                            <td>2</td>
                            <td>Технологическая часть</td>
                            <td>Подборка данных видеоматериалов объясняет принцип работы технологий, используемых в проекте Энебра.  </td>
                            <td>Развивающие фильмы, научно-популярные фильмы</td>
                            <td>Подборка видео материалов для понимания современных технологий обработки и хранения информации</td>
                            <td>4</td>
                            <td>Ru</td>
                            <td><a href="edit.html" class="fa fa-pencil"></a> <a href="#" class="fa fa-remove"></a></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection