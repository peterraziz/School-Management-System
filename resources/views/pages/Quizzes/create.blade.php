@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('subjects_trans.add_exam')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('subjects_trans.add_exam')}}
    </h4>
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
                            <form action="{{route('Quizzes.store')}}" method="post" {{--autocomplete="off"--}} >
                                @csrf
                                
                                <div class="form-row">
                                    
                                    <div class="col">
                                        <label for="title">{{trans('subjects_trans.exam_name_ar')}}</label>
                                        <input required type="text" name="Name_ar" class="form-control">
                                    </div>
                                    
                                    <div class="col">
                                        <label for="title">{{trans('subjects_trans.exam_name_en')}}</label>
                                        <input required type="text" name="Name_en" class="form-control">
                                    </div>
                                </div>
                                <br>
                                
                                <div class="form-row">
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('subjects_trans.subject_name')}} : <span class="text-danger">*</span></label>
                                            <select required class="custom-select mr-sm-2" name="subject_id">
                                                <option selected disabled>{{trans('subjects_trans.select_subject')}}...</option>
                                                @foreach($subjects as $subject)
                                                    <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('subjects_trans.teacher_name')}} : <span class="text-danger">*</span></label>
                                            <select required class="custom-select mr-sm-2" name="teacher_id">
                                                <option selected disabled>{{trans('subjects_trans.select_teacher_name')}}...</option>
                                                @foreach($teachers as $teacher)
                                                    <option  value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                </div><br>
                                
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                            <select required class="custom-select mr-sm-2" name="Grade_id">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                            <select required class="custom-select mr-sm-2" name="Classroom_id"> </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                            <select required class="custom-select mr-sm-2" name="section_id">
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">
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