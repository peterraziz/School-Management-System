@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
{{trans('subjects_trans.add_new_question')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('subjects_trans.add_new_question')}}
    </h4> 
@stop
<!-- breadcrumb --> 
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('questions.store') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-row">
                                    
                                    <div class="col">
                                        <label for="title">{{trans('subjects_trans.questions_name')}}</label>
                                        <input required type="text" name="title" id="input-name"
                                            class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('subjects_trans.answers')}}
                                            <span style="color: red; " >
                                                ( {{trans('subjects_trans.answers_separated')}} )
                                            </span>
                                        </label>
                                        <textarea required name="answers" class="form-control" id="exampleFormControlTextarea1"
                                            rows="4"></textarea>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('subjects_trans.right_answer')}}</label>
                                        <input required type="text" name="right_answer" id="input-name"
                                            class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('subjects_trans.exam_name')}} : <span
                                                class="text-danger">*</span></label>
                                            <select required class="custom-select mr-sm-2" name="quiz_id">
                                                <option selected disabled>{{trans('subjects_trans.select_exam_name')}}...</option>
                                                @foreach($quizzes as $quizze)
                                                    <option value="{{ $quizze->id }}">{{ $quizze->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('subjects_trans.degree')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score">
                                                <option selected disabled> {{trans('subjects_trans.select_degree')}}...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                                <option value="25">25</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">
                                    {{trans('subjects_trans.save_data')}}
                                </button>
                            </form>
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