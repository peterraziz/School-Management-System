@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
{{trans('accounts_trans.school_invoices')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('accounts_trans.school_invoices')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('accounts_trans.name')}}</th>
                                            <th>{{trans('accounts_trans.fees_type')}}</th>
                                            <th>{{trans('accounts_trans.amount')}}</th>
                                            <th>{{trans('accounts_trans.Grade')}}</th>
                                            <th>{{trans('accounts_trans.classrooms')}}</th>
                                            <th>{{trans('accounts_trans.statement')}}</th> 
                                            <th>{{trans('accounts_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fee_invoices as $Fee_invoice)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$Fee_invoice->student->name}}</td>
                                            <td>{{$Fee_invoice->fees->title}}</td>
                                            <td>{{ number_format($Fee_invoice->amount, 2) }}</td>
                                            <td>{{$Fee_invoice->grade->Name}}</td>
                                            <td>{{$Fee_invoice->classroom->Name_Class}}</td>
                                            <td>{{$Fee_invoice->description}}</td>
                                            <td>
                                                <a href="{{route('sons.receipt',$Fee_invoice->student_id)}}" title="{{trans('accounts_trans.payments')}}" 
                                                    class="btn btn-info btn-sm" role="button" aria-pressed="true">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            </tr> 
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