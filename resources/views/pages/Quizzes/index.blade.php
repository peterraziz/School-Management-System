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
                            
                                <a href="{{route('Quizzes.create')}}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true"> {{trans('subjects_trans.add_exam')}}
                                </a>
                            
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('subjects_trans.exam_name')}}</th>
                                            <th>{{trans('subjects_trans.teacher_name')}}</th>
                                            <th>{{trans('subjects_trans.Grade')}}</th>
                                            <th>{{trans('subjects_trans.classrooms')}}</th>
                                            <th>{{trans('subjects_trans.section')}}</th>
                                            <th>{{trans('subjects_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($quizzes as $quizze)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$quizze->name}}</td>
                                                <td>{{$quizze->teacher->Name}}</td>
                                                <td>{{$quizze->grade->Name}}</td>
                                                <td>{{$quizze->classroom->Name_Class}}</td>
                                                <td>{{$quizze->section->Name_Section}}</td>
                                                <td>
                                                    <a href="{{route('Quizzes.show',$quizze->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true" 
                                                        title="{{trans('subjects_trans.Show_questions')}}"> <i class="fa fa-binoculars"></i>
                                                    </a>
                                                
                                                    <a href="{{route('student_quiz2',$quizze->id)}}" class="btn btn-success btn-sm" role="button" aria-pressed="true" 
                                                        title="{{trans('subjects_trans.list_tested')}}"> <i class="far fa-eye"></i>
                                                    </a> 
                                                
                                                    <a href="{{route('Quizzes.edit',$quizze->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" 
                                                        title="{{trans('subjects_trans.edit')}}"> <i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_exam{{ $quizze->id }}" 
                                                        title="{{trans('subjects_trans.delete')}}"><i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            
                                            <div class="modal fade" id="delete_exam{{$quizze->id}}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Quizzes.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                                    {{trans('subjects_trans.delete_exam')}}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        
                                                            {{-- <div class="modal-body">
                                                                <p> {{ trans('My_Classes_trans.Warning_Grade') }} {{$quizze->name}}</p>
                                                                <input type="hidden" name="id" value="{{$quizze->id}}">
                                                            </div> --}}
                                                            
                                                            <div class="modal-body">
                                                                <h4 style="font-family: 'Cairo', sans-serif;"> 
                                                                    {{ trans('My_Classes_trans.Warning_Grade') }}
                                                                </h4>
                                                                <input type="hidden" name="id" value="{{$quizze->id}}">
                                                                <hr>
                                                                <h6 style="font-family: 'Cairo', sans-serif;">  
                                                                    <span class="text-danger">
                                                                        ( 
                                                                        {{$quizze->name}}
                                                                        )
                                                                        <br>
                                                                        {{$quizze->subject->name}} - 
                                                                        {{$quizze->teacher->Name}} - 
                                                                        {{$quizze->grade->Name}} - 
                                                                        {{$quizze->classroom->Name_Class}} - 
                                                                        {{$quizze->section->Name_Section}}
                                                                        
                                                                </h6>
                                                            </div>
                                                        
                                                        
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}
                                                                    </button>
                                                                
                                                                    <button type="submit" class="btn btn-danger">
                                                                        {{trans('subjects_trans.delete')}}
                                                                    </button>
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