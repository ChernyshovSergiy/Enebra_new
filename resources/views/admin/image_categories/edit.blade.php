@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Image Category
                <small>edit image category</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('image_categories.index')}}">Image Categories</a></li>
                <li class="active">Edit Image Categories</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => ['image_categories.update', $imageCategory->id], 'method' => 'put']) !!}
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Image Categories</h3>
                        @include('admin.error')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $imageCategory->title }}">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('image_categories.index')}}" class="btn btn-default">Назад</a>
                        <button class="btn btn-warning pull-right">Изменить</button>
                    </div>
                    <!-- /.box-footer-->
                {{ Form::close() }}
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection