@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_blocks')
                <small>@lang('admin.it_all_text_blocks_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.listing_blocks')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
        {{ Form::open([
            'route' => 'descriptions.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.descriptions')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('descriptions.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.desc_block')</th>
                            <th>@lang('column.title')</th>
                            <th>@lang('column.sub_title')</th>
                            <th>@lang('column.italic_text')</th>
                            <th>@lang('column.bold_text')</th>
                            <th>@lang('column.regular_text')</th>
                            <th>@lang('column.image_text_1')</th>
                            <th>@lang('column.image_text_2')</th>
                            <th>@lang('column.link_text')</th>
                            <th>@lang('column.link')</th>
                            <th>@lang('column.bg_image_id')</th>
                            <th>@lang('column.shadow_bg')</th>
                            <th>@lang('column.in_image_id_1')</th>
                            <th>@lang('column.in_image_id_2')</th>
                            <th>@lang('column.sort')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($descriptions as $text_block)
                            <tr>
                                <td>{{ $text_block->id }}</td>
                                <td>{{ $text_block->getBlockTitle() }}</td>
                                <td>{!! $text_block->content ? str_limit($text_block->content->title->$locale, 20 ) : '' !!}</td>
                                <td>{!! $text_block->content ? str_limit($text_block->content->sub_title->$locale, 20 ) : '' !!}</td>
                                <td>{!! $text_block->content ? str_limit($text_block->content->italic_text->$locale, 20 ) : '' !!}</td>
                                <td>{!! $text_block->content ? str_limit($text_block->content->bold_text->$locale, 20 ) : '' !!}</td>
                                <td>{!! $text_block->content ? str_limit($text_block->content->regular_text->$locale, 20 ) : '' !!}</td>
                                <td>{!! $text_block->content ? str_limit($text_block->content->image_text_1->$locale, 20 ) : '' !!}</td>
                                <td>{!! $text_block->content ? str_limit($text_block->content->image_text_2->$locale, 20 ) : '' !!}</td>
                                <td>{!! $text_block->content ? str_limit($text_block->content->link_text->$locale, 20 ) : '' !!}</td>
                                <td>{!! $text_block->content ? str_limit($text_block->content->link->$locale, 20 ) : '' !!}</td>
                                <td>
                                    <img src="{{ $text_block->getBGImage() }}" alt="" width="60">
                                </td>
                                <td>{{ $text_block->shadow }}</td>
                                <td>
                                    <img src="{{ $text_block->getImageIn1() }}" alt="" width="60">
                                </td>
                                <td>
                                    <img src="{{ $text_block->getImageIn2() }}" alt="" width="60">
                                </td>
                                <td>{{ $text_block->sort }}</td>
                                <td>
                                    {{--<a href="{{route('introduction_points.show', $inf_intr_point->id)}}" class="fa fa-eye"></a>--}}
                                    <a href="{{route('descriptions.edit', $text_block->id)}}" class="text-yellow fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['descriptions.destroy', $text_block->id], 'method'=>'delete']) }}
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