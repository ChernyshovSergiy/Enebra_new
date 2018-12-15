@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_videos')
                <small>@lang('admin.it_all_videos_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active"> @lang('admin.listing_videos')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'inf_videos.store',
            'files' => true
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_videos')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('inf_videos.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.object_name')</th>
                            <th>@lang('column.description')</th>
                            <th>@lang('column.about_author')</th>
                            <th>@lang('column.link')</th>
                            <th>@lang('column.duration_time')</th>
                            <th>@lang('column.video_group')</th>
                            <th>@lang('column.section')</th>
                            <th>@lang('column.image')</th>
                            <th>@lang('column.sort')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)
                            <tr>
                                <td>{{ $video->id }}</td>
                                <td>{!! $video->info ? $video->info->title->$locale : '' !!}</td>
                                <td>{!! $video->info ? str_limit($video->info->description->$locale, 20, ' &raquo') : '' !!}</td>
                                <td>{!! $video->info ? str_limit($video->info->about_author->$locale, 20, ' &raquo') : '' !!}</td>
                                <td>{!! $video->info ? $video->info->link->$locale : '' !!}</td>
                                <td>{!! $video->info ? $video->info->duration_time->$locale : '' !!}</td>
                                <td>{{ $video->getVideoGroup()}}</td>
                                <td>{{ $video->getVideoGroupSection()}}</td>
                                <td>
                                    <img src="{!! $video->info ? $video->info->image_id->$locale : '' !!}" alt="" width="100">
                                </td>
                                <td>{{ $video->sort }}</td>
                                <td>
                                    {{--<a href="{{route('inf_videos.show', $video->id)}}" class="fa fa-eye"></a>--}}
                                    <a href="{{route('inf_videos.edit', $video->id)}}" class="text-yellow fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['inf_videos.destroy', $video->id], 'method'=>'delete']) }}
                                    <button onclick="return confirm('Are you sure?') " type="submit" class="delete">
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