@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{ trans('accounts_trans.edit_payments') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{ trans('accounts_trans.edit_payments') }}
        {{-- : <label style="color: red">( {{$receipt_student->student->name}} )</label> --}}
    </h4> 
@stop
<!-- breadcrumb --> 
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    
                    <h4 style="font-family: 'Cairo', sans-serif;">
                        <span class="text-danger">
                            ( 
                            {{$receipt_student->student->name}} - 
                            {{$receipt_student->student->grade->Name}} - 
                            {{$receipt_student->student->classroom->Name_Class}} - 
                            {{$receipt_student->student->section->Name_Section}} 
                            )
                        </span>
                    </h4>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        
                            <form action="{{route('receipt_students.update','test')}}" method="post" autocomplete="off">
                                @method('PUT')
                                @csrf
                            @csrf
                            <div class="row">
                                <div class="col-md-12"> 
                                    <br>
                                    <div class="form-group">
                                        <label>{{ trans('accounts_trans.amount') }} : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="Debit" value="{{$receipt_student->Debit}}" type="number" >
                                        <input  type="hidden" name="student_id" value="{{$receipt_student->student->id}}" class="form-control">
                                        <input  type="hidden" name="id"  value="{{$receipt_student->id}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        
                        <br>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ trans('accounts_trans.statement') }} : <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$receipt_student->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                        </form>
                        
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