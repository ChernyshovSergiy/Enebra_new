@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Introduction Point
                <small>it edit Introduction Point here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('introduction_points.index')}}"><i class="fa fa-map-marker"></i> Listing Introduction Points</a></li>
                <li class="active">Edit Introduction Point</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['introduction_points.update', $inf_intr_point->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменяем динамический пункт плана изучения проекта в Ведении</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пункт</label>
                            <textarea name="point" id="" cols="80" rows="10" class="form-control">{{$inf_intr_point->point}}</textarea>
                            <p class="help-block">Name format!!! -> text</p>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Пункт</label>--}}
                            {{--<input type="text" name="point" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $inf_intr_point->point }}">--}}
                            {{--<p class="help-block">Name format!!! -> text</p>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ссылка</label>
                            <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $inf_intr_point->link }}">
                            <p class="help-block">Name format!!! -> enebra.org/video/informative-part</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Порядковый номер</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $inf_intr_point->sort }}">
                            <p class="help-block">Name format!!! -> 1 </p>
                        </div>

                        <div class="form-group">
                            <label>Язык</label>
                            {{ Form::select('language_id',
                                $language,
                                $inf_intr_point->language_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('introduction_points.index')}}" class="btn btn-default">Назад</a>
                    <button class="btn btn-warning pull-right">Изменить</button>
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