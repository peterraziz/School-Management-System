@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
{{ trans('subjects_trans.Book_List') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{ trans('subjects_trans.Book_List') }}
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
                                <a href="{{route('library.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">
                                    {{ trans('subjects_trans.Add_New_Book') }}
                                </a>
                                    <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('subjects_trans.Book_Name') }}</th>
                                            <th>{{ trans('subjects_trans.teacher_name') }}</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th> 
                                            <th>{{ trans('subjects_trans.Processes') }}</th> 
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($books as $book)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$book->title}}</td>
                                                <td>{{$book->teacher->Name}}</td>
                                                <td>{{$book->grade->Name}}</td>
                                                <td>{{$book->classroom->Name_Class}}</td>
                                                <td>{{$book->section->Name_Section}}</td>
                                                <td>
                                                    <a href="{{route('downloadAttachment',$book->file_name)}}" 
                                                        title="{{ trans('subjects_trans.Download_Book') }}" class="btn btn-success btn-sm" role="button" aria-pressed="true"><i class="fas fa-download"></i>
                                                    </a>
                                                
                                                    <a href="{{route('library.edit',$book->id)}}" class="btn btn-info btn-sm"
                                                        title="{{ trans('subjects_trans.edit') }}"  role="button" aria-pressed="true"><i class="fa fa-edit"></i>
                                                    </a>
                                                
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" 
                                                    title="{{ trans('subjects_trans.delete') }}" data-target="#delete_book{{ $book->id }}"><i class="fa fa-trash"></i>
                                                </button>
                                                </td>
                                            </tr>
                                        
                                        @include('pages.library.destroy')
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