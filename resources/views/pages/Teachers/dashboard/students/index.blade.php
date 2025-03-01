@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('attendance_trans.attendance_and_absence')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('attendance_trans.attendance_and_absence')}}
    </h4>
@stop
<!-- breadcrumb --> 
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
            
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if (session('status'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ session('status') }}</li>
                        </ul>
                    </div>
                @endif
                
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">
                    
                
                <h5 style="font-family: 'Cairo', sans-serif;color: rgb(68, 0, 255)"> 
                    {{trans('attendance_trans.todays_date')}} : {{ date('Y-m-d') }}
                </h5>
                <hr>
                
                <form method="post" action="{{ route('attendance') }}" autocomplete="off">  
                    @csrf
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                        <tr class="alert-success"> 
                            <th>#</th>
                            <th>{{trans('Students_trans.name')}}</th>
                            <th>{{trans('Students_trans.email')}}</th>
                            <th>{{trans('Students_trans.gender')}}</th>
                            <th>{{trans('Students_trans.Grade')}}</th>
                            <th>{{trans('Students_trans.classrooms')}}</th>
                            <th>{{trans('Students_trans.section')}}</th>
                            <th>{{trans('Students_trans.Processes')}}</th>
                        </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->gender->Name}}</td> 
                                <td>{{$student->grade->Name}}</td>  
                                <td>{{$student->classroom->Name_Class}}</td>  
                                <td>{{$student->section->Name_Section}}</td>
                                <td> 
                                    
                                    {{-- this code is with attendance the other way in Controllers\Teachers\dashboard\StudentController.php --}}
                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                        <input name="attendences[{{ $student->id }}]"
                                            @foreach($student->attendance()->where('attendence_date',date('Y-m-d'))->get() as $attendance)
                                            {{ $attendance->attendence_status == 1 ? 'checked' : '' }}
                                            @endforeach
                                            class="leading-tight" type="radio"
                                            value="presence">
                                        <span class="text-success">{{trans('attendance_trans.attendance')}}</span>
                                    </label>
                                    
                                    <label class="ml-4 block text-gray-500 font-semibold">
                                        <input name="attendences[{{ $student->id }}]"
                                            @foreach($student->attendance()->where('attendence_date',date('Y-m-d'))->get() as $attendance)
                                            {{ $attendance->attendence_status == 0 ? 'checked' : '' }}
                                            @endforeach
                                            class="leading-tight" type="radio" value="absent">
                                        <span class="text-danger">{{trans('attendance_trans.absence')}}</span>
                                    </label>
                                    
                                    <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                                    <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                                    <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                
                                    {{-- @if(isset($student->attendance()->where('attendence_date',date('Y-m-d'))->where('student_id',$student->id)->first()->student_id))
                                    
                                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                            <input name="attendences[{{ $student->id }}]" disabled
                                                {{ $student->attendance()->first()->attendence_status == 1 ? 'checked' : '' }}
                                                class="leading-tight" type="radio" value="presence">
                                            <span class="text-success">{{trans('attendance_trans.attendance')}}</span>
                                        </label>
                                    
                                        <label class="ml-4 block text-gray-500 font-semibold">
                                            <input name="attendences[{{ $student->id }}]" disabled {{ $student->attendance()->first()->attendence_status == 0 ? 'checked' : '' }}
                                                class="leading-tight" type="radio" value="absent">
                                            <span class="text-danger">{{trans('attendance_trans.absence')}}</span>
                                        </label>
                                    
                                        <button type="button" class="btn btn-secondary btn-sm"
                                        data-toggle="modal"  
                                        data-target="#edit_attendance{{ $student->id }}" 
                                        title="{{trans('subjects_trans.edit')}}">
                                        <i class="fa fa-edit"></i> 
                                        </button> 
                                    
                                        @include('pages.Teachers.dashboard.students.edit_attendance')  {{--Modal
                                    @else
                                        
                                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                            <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                                value="presence">
                                            <span class="text-success">{{trans('attendance_trans.attendance')}}</span>
                                        </label>
                                    
                                        <label class="ml-4 block text-gray-500 font-semibold">
                                            <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                                value="absent">
                                            <span class="text-danger">{{trans('attendance_trans.absence')}}</span>
                                        </label>
                                    
                                        <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                        <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                                        <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                                        <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                    @endif --}}
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <P>
                        <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
                    </P>
                </form><br><br><br>
                <!-- row closed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
{{-- or:: --}}
@toastr_js
@toastr_render
@endsection