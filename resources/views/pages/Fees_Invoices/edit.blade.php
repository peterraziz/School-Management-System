@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('accounts_trans.edit_fees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('accounts_trans.edit_fees')}}
    </h4> 
@stop
<!-- breadcrumb --> 
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <h4 style="font-family: 'Cairo', sans-serif;">
                    <span class="text-primary">
                        (  
                        {{$studentt->name}} - 
                        {{$studentt->grade->Name}} - 
                        {{$studentt->classroom->Name_Class}} 
                        )
                    </span> 
                    </h4>
                    <hr>
                    
                    <form action="{{route('Fees_Invoices.update','test')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('accounts_trans.student_name')}}</label>
                                <input type="text" value="{{$fee_invoices->student->name}}" readonly name="title_ar" class="form-control">
                                <input type="hidden" value="{{$fee_invoices->id}}" name="id" class="form-control">
                            </div>
                            
                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('accounts_trans.amount')}}</label>
                                <input type="number" value="{{$fee_invoices->amount}}" name="amount" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputZip">{{trans('accounts_trans.fees_type')}}</label>
                                <select class="custom-select mr-sm-2" name="fee_id">
                                    @foreach($fees as $fee)
                                        <option value="{{$fee->id}}" {{$fee->id == $fee_invoices->fee_id ? 'selected':"" }}>{{$fee->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputAddress">{{trans('accounts_trans.Notes')}}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$fee_invoices->description}}</textarea>
                        </div>
                        <br>
                        
                        <button type="submit" class="btn btn-primary">{{trans('accounts_trans.submit')}}</button>
                    
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