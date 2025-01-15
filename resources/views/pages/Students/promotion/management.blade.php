@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('main_trans.Students_Promotions_list')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('main_trans.Students_Promotions_list')}}
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
                            
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                    {{trans('Students_trans.rollback_all')}}
                                </button>
                                <br><br>
                                
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('Students_trans.name')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.Old_school_grade')}} </th>
                                            <th class="alert-danger">{{trans('Students_trans.Old_school_classroom')}} </th>
                                            <th class="alert-danger">{{trans('Students_trans.Old_school_section')}} </th>
                                            <th class="alert-danger">{{trans('Students_trans.Old_school_year')}} </th>
                                            <th class="alert-success">{{trans('Students_trans.Current_school_grade')}} </th>
                                            <th class="alert-success">{{trans('Students_trans.Current_school_classroom')}} </th>
                                            <th class="alert-success">{{trans('Students_trans.Current_school_section')}} </th>
                                            <th class="alert-success">{{trans('Students_trans.Current_school_year')}} </th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->from_grade_->Name}}</td>
                                                <td>{{$promotion->from_classroom_->Name_Class}}</td>
                                                <td>{{$promotion->from_section_->Name_Section}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->to_grade_->Name}}</td>
                                                <td>{{$promotion->to_Classroom_->Name_Class}}</td>  
                                                <td>{{$promotion->to_section_->Name_Section}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                {{-- <td>
                                                    <a href="{{route('Students.edit',$promotion->id)}}"
                                                    class="btn btn-info btn-sm"title="{{trans('Grades_trans.Edit')}}" role="button" aria-pressed="true">
                                                    <i class="fa fa-edit"></i></a>
                                                
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_Student{{ $promotion->id }}"
                                                            title="{{ trans('Grades_trans.Delete') }}">
                                                            <i class="fa fa-trash"></i>
                                                    </button>
                                                
                                                    <a href="{{route('Students.show',$promotion->id)}}"
                                                    class="btn btn-warning btn-sm" title="{{ trans('Students_trans.DataAndAttachments') }}" role="button" aria-pressed="true">
                                                    <i class="far fa-eye"></i></a>
                                                
                                                </td> --}}
                                                <td>
                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" 
                                                        data-target="#Delete_one{{$promotion->id}}">
                                                        {{trans('Students_trans.rollback_student')}}
                                                    </button>
                                                
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" 
                                                    data-target="#">
                                                    {{trans('Students_trans.Out_student')}}
                                                </button>
                                                </td>
                                            </tr>
                                        @include('pages.Students.promotion.Delete_all')
                                        @include('pages.Students.promotion.Delete_one')
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
@endsection