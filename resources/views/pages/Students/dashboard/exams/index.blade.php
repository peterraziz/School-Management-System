@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    @section('title')
        {{trans('subjects_trans.exams_list')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('subjects_trans.exams_list')}}
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
                                            <th>{{trans('subjects_trans.subject_name')}}</th>
                                            <th>{{trans('subjects_trans.exam_name')}}</th>
                                            <th>{{trans('subjects_trans.start_or_score_exam')}}</th> 
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($quizzes as $quiz)
                                            <tr style="color:rgb(0, 0, 0)">
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$quiz->subject->name}}</td>
                                                <td>{{$quiz->name}}</td>
                                                <td> 
                                                    @if($quiz->degree->count() > 0 && $quiz->id == $quiz->degree[0]->quiz_id) 
                                                        {{$quiz->degree[0]->score}} 
                                                    
                                                    @else
                                                        <a href="{{route('student_exams.show',$quiz->id)}}"
                                                        class="btn btn-outline-success btn-sm" role="button"
                                                        aria-pressed="true" onclick="alertAbuse()" title="{{trans('subjects_trans.start_exam')}}">
                                                        <i class="fas fa-person-booth"></i>
                                                        </a>
                                                    @endif 
                                                </td>
                                            </tr>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- or:: --}}
    {{-- @toastr_js
    @toastr_render --}}

    <script>
        function alertAbuse() {
            alert('{{trans('subjects_trans.warning')}}');
        }
    </script>

@endsection