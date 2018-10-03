@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Countries
                <small>it edit country here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('countries.index')}}"><i class="fa fa-image"></i> Listing Countries</a></li>
                <li class="active">Edit Country</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['countries.update', $country->id], 'method'=>'put', 'files' => true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменяем страну</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $country->name }}">
                            <p class="help-block">Name format!!! -> Україна</p>
                        </div>

                        <div class="form-group">
                            <label>Язык</label>
                            {{ Form::select('language_id',
                                $language,
                                $country->language_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                        <div class="form-group">
                            <label>Флаг</label>
                            {{ Form::select('image_id',
                                $flag_image,
                                $country->image_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('countries.index')}}" class="btn btn-default">Назад</a>
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