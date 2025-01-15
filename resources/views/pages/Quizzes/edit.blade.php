@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('subjects_trans.edit_exam')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        <span class="text-primary">
            {{trans('subjects_trans.edit_exam')}}
        </span>
    </h4> 
    {{-- {{$quizz->name}} --}}
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
                            <form action="{{route('Quizzes.update','test')}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                
                                    <div class="col">
                                        <label for="title">{{trans('subjects_trans.exam_name_ar')}}</label>
                                        <input required type="text" name="Name_ar" value="{{$quizz->getTranslation('name','ar')}}" class="form-control">
                                        <input type="hidden" name="id" value="{{$quizz->id}}">  
                                    </div>
                                
                                    <div class="col">
                                        <label for="title">{{trans('subjects_trans.exam_name_en')}}</label>
                                        <input required type="text" name="Name_en" value="{{$quizz->getTranslation('name','en')}}" class="form-control">
                                    </div>
                                </div>
                                <br>
                            
                                <div class="form-row">
                                
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('subjects_trans.subject_name')}} : <span class="text-danger">*</span></label>
                                            <select required class="custom-select mr-sm-2" name="subject_id">
                                                @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}" {{$subject->id == $quizz->subject_id ? "selected":""}}>{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('subjects_trans.teacher_name')}} : <span class="text-danger">*</span></label>
                                            <select required class="custom-select mr-sm-2" name="teacher_id">
                                                @foreach($teachers as $teacher)
                                                    <option  value="{{ $teacher->id }}" {{$teacher->id == $quizz->teacher_id ? "selected":""}}>{{ $teacher->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> <br>
                            
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                            <select required class="custom-select mr-sm-2" name="Grade_id">
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}" {{$grade->id == $quizz->grade_id ? "selected":""}}>{{ $grade->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                            <select required class="custom-select mr-sm-2" name="Classroom_id">
                                                <option value="{{$quizz->classroom_id}}">{{$quizz->classroom->Name_Class}}</option> 
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                            <select required class="custom-select mr-sm-2" name="section_id">
                                                <option value="{{$quizz->section_id}}">{{$quizz->section->Name_Section}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><br>
                                <button class="btn btn-primary btn-sm nextBtn btn-lg pull-right" type="submit">
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
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection