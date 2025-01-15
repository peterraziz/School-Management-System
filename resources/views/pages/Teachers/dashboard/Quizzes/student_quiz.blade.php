@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('subjects_trans.list_tested')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('subjects_trans.list_tested')}}
    </h4>
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('subjects_trans.student_name')}}</th>
                                            <th>{{trans('subjects_trans.last_question')}}</th>
                                            <th>{{trans('subjects_trans.degree')}}</th>
                                            <th>{{trans('subjects_trans.Manipulation_status')}}</th>
                                            <th>{{trans('subjects_trans.Date_quiz_taken')}}</th>
                                            <th>{{trans('subjects_trans.Processes')}}</th> 
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($degrees as $degree)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$degree->student->name}}</td>
                                                <td>{{$degree->question_id}}</td>
                                                <td>{{$degree->score}}</td>
                                                @if($degree->abuse == 0)
                                                    <td style="color: green">{{trans('subjects_trans.No_manipulation')}}</td>
                                                @else
                                                    <td style="color: red"> {{trans('subjects_trans.manipulation')}}</td>
                                                @endif
                                                <td>{{$degree->created_at}}</td>
                                                <td>
                                                    {{-- <button type="button" class="btn btn-info btn-sm" title="لأجابات الطلاب">
                                                            <i class="fas fa-repeat"></i>
                                                    </button> --}}
                                                    <a href="{{route('student_answer')}}" class="btn btn-info btn-sm" title="لأجابات الطلاب">
                                                        <i class="fas fa-repeat"></i>
                                                    </a> 
                                                
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#repeat_quiz{{ $degree->quiz_id }}" title="{{trans('subjects_trans.retest')}}">
                                                            <i class="fas fa-repeat"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        
                                            <div class="modal fade" id="repeat_quiz{{$degree->quiz_id}}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('repeat_quiz', $degree->quiz_id)}}" method="post">
                                                        {{method_field('post')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel"> {{trans('subjects_trans.retest')}}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6 style="font-family: 'Cairo', sans-serif;">{{$degree->student->name}}</h6>
                                                                <input type="hidden" name="student_id" value="{{$degree->student_id}}">
                                                                <input type="hidden" name="quiz_id" value="{{$degree->quiz_id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                        class="btn btn-info">{{ trans('My_Classes_trans.submit') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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