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
    @section('PageTitle')
        {{trans('subjects_trans.list_tested')}}
    @stop
    <!-- breadcrumb -->
@endsection
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
                                            <th>{{trans('subjects_trans.exam_name')}}</th>
                                            <th>{{trans('subjects_trans.degree')}}</th> 
                                            <th>{{trans('subjects_trans.Date_quiz_taken')}}</th> 
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($degrees as $degree)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$degree->student->name}}</td> 
                                                <td>{{$degree->quiz->name}}</td> 
                                                <td>{{$degree->score}}</td> 
                                                <td>{{$degree->created_at}}</td> 
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
{{-- or:: --}}
@toastr_js
@toastr_render
@endsection