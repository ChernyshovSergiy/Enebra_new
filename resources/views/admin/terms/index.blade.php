@extends('admin.layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_terms')
                <small>@lang('admin.it_all_terms_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.listing_terms')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'terms.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_terms')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('terms.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            {{--<th>@lang('column.id')</th>--}}
                            <th>@lang('column.title')</th>
                            <th>@lang('column.left_textarea')</th>
                            <th>@lang('column.right_textarea')</th>
                            <th>@lang('column.down_textarea')</th>
                            <th>@lang('column.views_count')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($terms as $term)
                            <tr>
                                {{--<td>{{ $term->id }}</td>--}}
                                <td>{!! $term->content ? str_limit($term->content->title->$locale, 20, ' &raquo') : '' !!}</td>
                                <td>{!! $term->content ? str_limit($term->content->left_textarea->$locale, 100, ' &raquo') : '' !!}</td>
                                <td>{!! $term->content ? str_limit($term->content->right_textarea->$locale, 100, ' &raquo') : '' !!}</td>
                                <td>{!! $term->content ? str_limit($term->content->down_textarea->$locale, 100, ' &raquo') : '' !!}</td>
                                <td>{{ $term->views_count ?? $term->views_count }}</td>
                                <td>
                                    {{--<a href="{{route('introductions.show', $term->id)}}" class="fa fa-eye"></a>--}}
                                    <a href="{{route('terms.edit', $term->id)}}" class="text-yellow fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['terms.destroy', $term->id], 'method'=>'delete']) }}
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