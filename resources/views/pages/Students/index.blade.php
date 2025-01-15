@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('main_trans.list_students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
<h4 style="font-family: 'Cairo', sans-serif;">
    {{trans('main_trans.list_students')}}
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
                                @can('Add student')
                                <a href="{{route('Students.create')}}" class="btn btn-success btn-sm" role="button"
                                    aria-pressed="true">{{trans('main_trans.add_student')}}
                                </a>
                                @endcan
                                <br><br>
                                <div class="table-responsive">
                                    
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('Students_trans.name')}}</th>
                                            <th>{{trans('Students_trans.email')}}</th>
                                            <th>{{trans('Students_trans.Phone_number')}}</th>
                                            <th>{{trans('Students_trans.gender')}}</th>
                                            <th>{{trans('Students_trans.Grade')}}</th>
                                            <th>{{trans('Students_trans.classrooms')}}</th>
                                            <th>{{trans('Students_trans.section')}}</th>
                                            @can('Processes for students')
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                            @endcan
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->Phone_number}}</td>
                                            <td>{{$student->gender->Name}}</td> {{-- gender: method in Model Student--}}
                                            <td>{{$student->grade->Name}}</td>  {{-- grade: method in Model Student--}}
                                            <td>{{$student->classroom->Name_Class}}</td>  {{-- classroom: method in Model Student--}}
                                            <td>{{$student->section->Name_Section}}</td>  {{-- section: method in Model Student--}} 
                                            @can('Processes for students')
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" 
                                                    aria-haspopup="true" aria-expanded="false"> {{ trans('Grades_trans.Processes') }}
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    
                                                        @can('Students Data and Attachments')
                                                        <a class="dropdown-item" href="{{route('Students.show',$student->id)}}"><i style="color: #ffc107" 
                                                            class="far fa-eye "></i>&nbsp;  {{ trans('Students_trans.DataAndAttachments') }}
                                                        </a>
                                                        @endcan
                                                    
                                                        @can('Add Invoice Fee')
                                                        <a class="dropdown-item" href="{{route('Fees_Invoices.show',$student->id)}}"><i style="color: #0000cc" 
                                                            class="fa fa-edit"></i>&nbsp;{{ trans('accounts_trans.add_invoice_fees') }}&nbsp;
                                                        </a>
                                                        @endcan
                                                    
                                                        @can('Pay fees')
                                                        <a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}"><i style="color: #9dc8e2" 
                                                            class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;  {{trans('accounts_trans.fees_paying')}} </a>
                                                        @endcan
                                                        
                                                        @can('Exclude fees')
                                                        <a class="dropdown-item" href="{{route('ProcessingFee.show',$student->id)}}"><i style="color: #671919" 
                                                            class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;  {{trans('main_trans.Exclude_fees')}} </a>
                                                        @endcan
                                                        
                                                        @can('Refund of fees')
                                                        <a class="dropdown-item" href="{{route('Payment_students.show',$student->id)}}"><i style="color: #5e58cb" 
                                                            class="fas fa-donate"></i>&nbsp; &nbsp;  {{trans('accounts_trans.refund_of_fees')}} </a>
                                                        @endcan
                                                        
                                                        @can('Edit student')
                                                        <a class="dropdown-item" href="{{route('Students.edit',$student->id)}}"><i style="color:green" 
                                                            class="fa fa-edit"></i>&nbsp; {{ trans('Grades_trans.Edit') }}
                                                        </a>
                                                        @endcan
                                                    
                                                        @can('Delete student')
                                                        <a class="dropdown-item" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="##Delete_Student{{ $student->id }}"><i style="color: red" 
                                                            class="fa fa-trash"></i>&nbsp;  {{ trans('Grades_trans.Delete') }}
                                                        </a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                                @endcan
                                            </tr>
                                        @include('pages.Students.Delete')
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