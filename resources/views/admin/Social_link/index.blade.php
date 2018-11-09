@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_social_links')
                <small>@lang('admin.it_all_social_links_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.listing_social_links')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'social_links.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_social_links')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('social_links.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>@lang('column.id')</th>
                                <th>@lang('column.object_name')</th>
                                <th>@lang('column.is_active')</th>
                                <th>@lang('column.url')</th>
                                <th>@lang('column.sort')</th>
                                <th>@lang('column.image_id')</th>
                                <th>@lang('column.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($social_links as $social_link)
                                <tr>
                                    <td>{{ $social_link->id }}</td>
                                    <td>{{ $social_link->name }}</td>
                                    <td>
                                        @if($social_link->is_active == 1)
                                            <a href="/admin/social_links/toggle/{{ $social_link->id }}" class="text-green fa fa-thumbs-o-up"></a>
                                        @else
                                            <a href="/admin/social_links/toggle/{{ $social_link->id }}" class="text-muted fa fa-lock"></a>
                                        @endif
                                    </td>
                                    {{--@if($social_link->url)--}}
                                        {{--<td>{{ $social_link->url }}</td>--}}
                                    {{--@endif--}}
                                    <td>{{ $social_link->parent }}</td>
                                    <td>{{ $social_link->sort }}</td>
                                    <td>{{ $social_link->getImage()}}</td>
                                    <td>
                                        <a href="{{route('social_links.edit', $social_link->id)}}" class="text-yellow fa fa-pencil"></a>
                                        {{ Form::open(['route'=>['social_links.destroy', $social_link->id], 'method'=>'delete']) }}
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
