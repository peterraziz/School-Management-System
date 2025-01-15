@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
{{trans('accounts_trans.modify_exclude_fees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('accounts_trans.modify_exclude_fees')}}
            {{-- : <label style="color: red">{{$ProcessingFee->student->name}}</label> --}}
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
                            {{$ProcessingFee->student->name}} - 
                            {{$ProcessingFee->student->grade->Name}} - 
                            {{$ProcessingFee->student->classroom->Name_Class}} - 
                            {{$ProcessingFee->student->section->Name_Section}} 
                            )
                        </span>
                    </h4>
                    <hr>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                            <form action="{{route('ProcessingFee.update','test')}}" method="post" autocomplete="off">
                                @method('PUT')
                                @csrf
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{trans('accounts_trans.amount')}} : <span class="text-danger">*</span></label>
                                        <input required class="form-control" name="Debit" value="{{$ProcessingFee->amount}}" type="number" >
                                        <input  type="hidden" name="student_id" value="{{$ProcessingFee->student->id}}" class="form-control">
                                        <input  type="hidden" name="id"  value="{{$ProcessingFee->id}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{trans('accounts_trans.statement')}} : <span class="text-danger">*</span></label>
                                        <textarea required class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$ProcessingFee->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            
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