@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('accounts_trans.payments')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('accounts_trans.payments')}}
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
                                            <th>{{trans('accounts_trans.amount')}}</th>
                                            <th>{{trans('accounts_trans.statement')}}</th> 
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($receipt_students as $receipt_student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$receipt_student->student->name}}</td>
                                            <td>{{ number_format($receipt_student->Debit, 2) }}</td>
                                            <td>{{$receipt_student->description}}</td> 
                                            </tr>
                                        @include('pages.Receipt.Delete')
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