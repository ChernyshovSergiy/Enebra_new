@extends('admin.layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_answer')
                <small>@lang('admin.it_edit_answer_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('faq_answers.index')}}"><i class="fa fa-info-circle"></i> @lang('admin.listing_answers')</a></li>
                <li class="active">@lang('admin.edit_answer')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['faq_answers.update', $answer->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_answer')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.question')</label>
                            {{ Form::select('faq_question_id',
                                $questions,
                                $answer->faq_question_id,
                                ['class' => 'form-control select2',
                                'placeholder' => Lang::get('admin.select_question')])
                            }}
                        </div>
                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.answer'): {{$language}}</label>
                                <textarea name="{{'answer'.':'.$language}}" id="" cols="80" rows="10" class="form-control">
                                    {{ $answer->answer ? $answer->answer->$language : ''}}</textarea>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.sort')</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $answer->sort }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.original')</label>
                            {{ Form::select('language_id',
                                $languages,
                                $answer->language_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.user')</label>
                            {{ Form::select('user_id',
                                $user_names,
                                $answer->user_id,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('faq_answers.index')}}" class="btn btn-default">@lang('button.back')</a>
                    <button class="btn btn-warning pull-right">@lang('button.edit')</button>
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