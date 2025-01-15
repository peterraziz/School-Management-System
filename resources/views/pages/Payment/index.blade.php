@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('accounts_trans.refund_of_fees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('accounts_trans.refund_of_fees')}}
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('accounts_trans.name')}}</th>
                                            <th>{{trans('accounts_trans.amount')}}</th>
                                            <th>{{trans('accounts_trans.statement')}}</th>
                                            <th>{{trans('accounts_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payment_students as $payment_student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$payment_student->student->name}}</td>
                                            <td>{{ number_format($payment_student->amount, 2) }}</td>
                                            <td>{{$payment_student->description}}</td>
                                            <td>
                                                <a title="{{trans('accounts_trans.edit')}}" href="{{route('Payment_students.edit',$payment_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button title="{{trans('accounts_trans.delete')}}" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$payment_student->id}}" ><i class="fa fa-trash"></i></button>
                                            </td>
                                            </tr>
                                        @include('pages.Payment.Delete')
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