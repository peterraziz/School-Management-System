@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('subjects_trans.Add_new_lecture')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<h4 style="font-family: 'Cairo', sans-serif;">
    {{trans('subjects_trans.Add_new_lecture')}}
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
                
                <form method="post" action="{{ route('indirect.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Grade_id">{{ trans('Students_trans.Grade') }}: <span
                                    class="text-danger">*</span>
                                </label>
                                <select required class="custom-select mr-sm-2" name="Grade_id">
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Classroom_id">{{ trans('Students_trans.classrooms') }}: <span
                                    class="text-danger">*</span>
                                </label>
                                <select required class="custom-select mr-sm-2" name="Classroom_id">
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id">{{ trans('Students_trans.section') }}: </label>
                                <select required class="custom-select mr-sm-2" name="section_id">
                                
                                </select>
                            </div>
                        </div>
                    </div><br>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>{{trans('subjects_trans.Lecture_Title')}}: <span class="text-danger">*</span></label>
                                <input required class="form-control" name="topic" type="text">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('subjects_trans.Lecture_time')}}: <span class="text-danger">*</span></label>
                                <input required class="form-control" type="datetime-local" name="start_time">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>{{trans('subjects_trans.Lecture_time_in_minutes')}}: <span class="text-danger">*</span></label>
                                <input required class="form-control" name="duration" type="number">
                            </div>
                        </div>
                        
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>{{trans('subjects_trans.Lecture_ID')}}: <span class="text-danger">*</span></label>
                                <input required class="form-control" name="meeting_id" type="number">
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>{{trans('subjects_trans.Lecture_password')}}: <span class="text-danger">*</span></label>
                                <input required class="form-control" name="password" type="text">
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="row"> 
                        <div class="col-md-8">
                            <div class="form-group">
                                <label> {{trans('subjects_trans.Student_Invitation_Link')}}: <span class="text-danger">*</span></label>
                                <input required class="form-control" name="join_url" type="text">
                            </div>
                        </div>
                    </div>
                
                    <div class="row"> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{trans('subjects_trans.Start_link')}}: <span class="text-danger">*</span></label>
                                <input required class="form-control" name="start_url" type="text">
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">{{ trans('Students_trans.submit') }}</button>
                </form>
                
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