@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
{{trans('subjects_trans.questions_list')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('subjects_trans.questions_list')}}
    </h4>
{{-- <span class="text-danger">{{$quizz->name}}</span> --}}
@stop
<!-- breadcrumb --> 
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                
                                <h4 style="font-family: 'Cairo', sans-serif;">
                                    <span class="text-primary">{{$quizz->name}}:</span>
                                </h4> <hr>
                                
                                <a href="{{route('questions.show',$quizz->id)}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">
                                    {{trans('subjects_trans.add_new_question')}}
                                </a>
                                <br><br>
                                
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th scope="col">#</th>
                                            <th scope="col">{{trans('subjects_trans.question')}}</th>
                                            <th scope="col">{{trans('subjects_trans.answers')}}</th>
                                            <th scope="col">{{trans('subjects_trans.right_answer')}}</th>
                                            <th scope="col">{{trans('subjects_trans.degree')}}</th>
                                            <th scope="col">{{trans('subjects_trans.exam_name')}}</th>
                                            <th scope="col">{{trans('subjects_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($questions as $question)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$question->title}}</td>
                                                <td>{{$question->answers}}</td>
                                                <td>{{$question->right_answer}}</td>
                                                <td>{{$question->score}}</td>
                                                <td>{{$question->quiz->name}}</td>
                                                <td>
                                                    <a href="{{route('questions.edit',$question->id)}}"
                                                        class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{trans('subjects_trans.edit')}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#delete_exam{{ $question->id }}" title="{{trans('subjects_trans.delete')}}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @include('pages.Questions.destroy2')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
{{-- or:: --}}
@toastr_js
@toastr_render
@endsection
