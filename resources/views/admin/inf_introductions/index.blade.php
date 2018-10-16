@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_introduction')
                <small>@lang('admin.the_introduction_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.introduction')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'introductions.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.introduction')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('introductions.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.title')</th>
                            <th>@lang('column.sub_title')</th>
                            <th>@lang('column.text')</th>
                            <th>@lang('column.replica')</th>
                            <th>@lang('column.conclusion')</th>
                            <th>@lang('column.language')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($introductions as $introduction)
                            <tr>
                                <td>{{ $introduction->id }}</td>
                                <td>{{ $introduction->title }}</td>
                                <td>{!! $introduction->sub_title !!}</td>
                                <td>{!! $introduction->text !!}</td>
                                <td>{!! $introduction->replica !!}</td>
                                <td>{!! $introduction->conclusion !!}</td>
                                <td>{{ $introduction->getLanguage()}}</td>
                                <td>
                                    {{--<a href="{{route('introductions.show', $introduction->id)}}" class="fa fa-eye"></a>--}}
                                    <a href="{{route('introductions.edit', $introduction->id)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['introductions.destroy', $introduction->id], 'method'=>'delete']) }}
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