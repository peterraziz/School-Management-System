@can('Students Data and Attachments')
@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('Students_trans.Student_details')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('Students_trans.Student_details')}}
    </h4>
    
@stop
<!-- breadcrumb --> 
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                    role="tab" aria-controls="home-02"
                                    aria-selected="true">{{trans('Students_trans.Student_details')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                    role="tab" aria-controls="profile-02"
                                    aria-selected="false">{{trans('Students_trans.Attachments')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                    aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.name')}}</th>
                                            <td>{{ $Student->name }}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.gender')}}</th>
                                            <td>{{$Student->gender->Name}}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.email')}}</th>
                                            <td>{{$Student->email}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.Id')}}</th>
                                            <td>{{$Student->National_ID}}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.Phone_number')}}</th>
                                            <td>{{$Student->Phone_number}}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.Nationality')}}</th>
                                            <td>{{$Student->Nationality->Name}}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.Grade')}}</th>
                                            <td>{{ $Student->grade->Name }}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.classrooms')}}</th>
                                            <td>{{$Student->classroom->Name_Class}}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.section')}}</th>
                                            <td>{{$Student->section->Name_Section}}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.Date_of_Birth')}}</th>
                                            <td>{{ $Student->Date_Birth}}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.parent')}}</th>
                                            <td>{{ $Student->myparent->Name_Father}} - {{ $Student->myparent->Name_Mother}}</td>
                                        </tr>
                                    
                                        <tr>
                                            <th scope="row">{{trans('Students_trans.academic_year')}}</th>
                                            <td>{{ $Student->academic_year }}</td>
                                        <tr>
                                            {{-- <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td> --}}
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            
                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                    aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{route('Upload_attachment')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">{{trans('Students_trans.Attachments')}}
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple required>
                                                        <input type="hidden" name="student_name" value="{{$Student->name}}">
                                                        <input type="hidden" name="student_id" value="{{$Student->id}}">
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="button button-border x-small">
                                                    {{trans('Students_trans.submit')}}
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                            style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('Students_trans.filename')}}</th>
                                                <th scope="col">{{trans('Students_trans.created_at')}}</th>
                                                <th scope="col">{{trans('Students_trans.Processes')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Student->images as $attachment) {{-- images is a method in student model--}}
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$attachment->filename}}</td>
                                                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                        href="{{url('Download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}"
                                                        role="button"><i class="fas fa-download"></i>&nbsp; {{trans('Students_trans.Download')}}</a>
                                                    
                                                        <!-- Button to Show Image -->
                                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#ShowImage{{ $attachment->id }}">
                                                            <i class="fas fa-eye"></i>&nbsp; {{trans('Students_trans.Show_Image')}}
                                                        </button>
                                                        
                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $attachment->id }}"
                                                                title="{{ trans('Grades_trans.Delete') }}">{{trans('Students_trans.delete')}}
                                                        </button>
                                                    
                                                    </td>
                                                </tr>
                                            
                                                <!-- Modal for Showing the Image -->
                                                <div class="modal fade" id="ShowImage{{ $attachment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;">*{{ trans('Students_trans.Lang_Image') }}*</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="text-align:center">
                                                                <!-- Display the Image -->
                                                                {{-- <img src="{{ asset('attachments/students/' . $attachment->imageable->name . '/' . $attachment->filename) }}" class="img-fluid" alt="{{ $attachment->filename }}"> --}}
                                                                <img src="{{ url('attachments/students/' . $attachment->imageable->name . '/' . $attachment->filename) }}" class="img-fluid" alt="{{ $attachment->filename }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                @include('pages.Students.Delete_img')
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
@endcan