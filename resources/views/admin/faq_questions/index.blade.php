@extends('admin.layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_questions')
                <small>@lang('admin.it_all_questions_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.listing_questions')</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'faq_questions.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_questions')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('faq_questions.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.page')</th>
                            <th>@lang('column.question')</th>
                            <th>@lang('column.sort')</th>
                            <th>@lang('column.user')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->getPageTitle() }}</td>
                                <td>{!! $question->question ? $question->question->$locale : '' !!}</td>
                                <td>{{ $question->sort }}</td>
                                <td>{{ $question->getUserName() }}</td>
                                <td>
                                    {{--<a href="{{route('introduction_points.show', $inf_intr_point->id)}}" class="fa fa-eye"></a>--}}
                                    <a href="{{route('faq_questions.edit', $question->id)}}" class="text-yellow fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['faq_questions.destroy', $question->id], 'method'=>'delete']) }}
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                        <i class="text-red fa fa-remove"></i>
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