@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
{{trans('subjects_trans.Online_lectures')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('subjects_trans.Online_lectures')}}
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
                                
                                {{-- <a href="{{route('online_classes.create')}}" class="btn btn-success btn-sm" role="button"
                                    aria-pressed="true"> اضافة حصة جديدة
                                </a> --}}
                            
                                <a class="btn btn-success" href="{{route('indirect.teacher.create')}}">
                                    {{trans('subjects_trans.Add_new_lecture')}}
                                </a>
                                
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                            data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th>
                                            <th>{{ trans('subjects_trans.teacher') }}</th>
                                            <th>{{ trans('subjects_trans.Lecture_Title') }}</th>
                                            <th>{{ trans('subjects_trans.Start_time') }}</th>
                                            <th>{{ trans('subjects_trans.Lecture_time') }}</th>
                                            <th>{{ trans('subjects_trans.Start_link') }}</th>
                                            <th>{{ trans('subjects_trans.Processes') }}</th>  
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_classes as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$online_classe->grade->Name}}</td>
                                                <td>{{ $online_classe->classroom->Name_Class }}</td>
                                                <td>{{$online_classe->section->Name_Section}}</td>
                                                {{-- <td>{{$online_classe->user->name}}</td> --}}
                                                <td>{{$online_classe->created_by}}</td>
                                                <td>{{$online_classe->topic}}</td>
                                                <td>{{$online_classe->start_at}}</td>
                                                <td>{{$online_classe->duration}}</td>
                                                <td class="btn btn-success text-white"><a href="{{$online_classe->join_url}}" target="_blank">{{trans('subjects_trans.join_now')}}</a></td>
                                                <td> 
                                                    <a href="{{ route('indirect.teacher.edit', $online_classe->id) }}" class="btn btn-info btn-sm" 
                                                        title="{{ trans('subjects_trans.edit') }}" role="button" aria-pressed="true">
                                                        <i class="fa fa-edit"></i>
                                                    </a> 
                                                    
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" 
                                                    title="{{ trans('subjects_trans.delete') }}" data-target="#Delete_receipt{{$online_classe->meeting_id}}"> 
                                                    <i class="fa fa-trash"></i>
                                                    </button>  
                                                
                                                    {{-- <a class="btn btn-success" href="{{route('indirect.create')}}">
                                                        اضافة حصة اوفلاين جديدة
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @include('pages.Teachers.dashboard.online_classes.delete')
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