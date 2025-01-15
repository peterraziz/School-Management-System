@extends('layouts.master')
@section('css')

@section('title') 
    {{trans('subjects_trans.Attendance_Reports')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        <a href="{{route('attendance.report2')}}"> 
            <h4 style="font-family: 'Cairo', sans-serif;">
                {{trans('subjects_trans.Student_Attendance_Reports')}} 
            </h4> 
        </a>
    </h4> 
@stop
<!-- breadcrumb -->

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
            
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="post"  action="{{ route('attendance.search2') }}" autocomplete="off">
                    @csrf
                    <h5 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('subjects_trans.Search')}}</h5><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student"> {{trans('subjects_trans.Students')}} </label>
                                <select class="custom-select mr-sm-2" name="student_id">
                                    <option value="0"> {{trans('subjects_trans.All_Students')}}</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <span class="input-group-addon">{{trans('subjects_trans.From')}} </span>
                                <input type="text"  class="form-control range-from date-picker-default" placeholder="{{trans('subjects_trans.Start_Date')}}" required name="from">
                                <span class="input-group-addon">{{trans('subjects_trans.To')}} </span>
                                <input class="form-control range-to date-picker-default" placeholder="{{trans('subjects_trans.End_Date')}}" type="text" required name="to">
                            </div>
                        </div>
                        
                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                </form>
                @isset($Students)
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                        <tr class="alert-success">
                            <th>#</th>
                            <th>{{trans('Students_trans.name')}}</th>
                            <th>{{trans('Students_trans.Grade')}}</th>
                            <th>{{trans('Students_trans.classrooms')}}</th>
                            <th>{{trans('Students_trans.section')}}</th>
                            <th>{{trans('subjects_trans.Date')}}</th>
                            <th class="alert-warning">{{trans('subjects_trans.Status')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Students as $student)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$student->students->name}}</td>
                                <td>{{$student->grade->Name}}</td>
                                <td>{{$student->classroom->Name_Class}}</td>
                                <td>{{$student->section->Name_Section}}</td>
                                <td>{{$student->attendence_date}}</td>
                                <td class="alert-warning">
                                
                                    @if($student->attendence_status == 0)
                                        <span class="text-danger"> {{trans('subjects_trans.Absence')}} </span>
                                    @else
                                        <span class="text-success"> {{trans('subjects_trans.Attendance')}} </span>
                                    @endif
                                </td>
                            </tr>
                        @include('pages.Students.Delete')
                        @endforeach
                    </table>
                </div>
                @endisset
            
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection