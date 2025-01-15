@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
{{trans('accounts_trans.add_new_invoice')}}@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('accounts_trans.add_new_invoice')}} 
    </h4>
{{-- <span class="text-success">(  
    {{$student->name}} - 
    {{$student->grade->Name}} - 
    {{$student->classroom->Name_Class}} 
    )</span>   --}}
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
                    
                    <span class="text-success">(  
                        {{$student->name}} - 
                        {{$student->grade->Name}} - 
                        {{$student->classroom->Name_Class}} )
                    </span> <hr>
                    
                        <form class=" row mb-30" action="{{ route('Fees_Invoices.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="repeater">
                                    <div data-repeater-list="List_Fees">
                                        <div data-repeater-item>
                                            <div class="row">
                                            
                                                <div class="col">
                                                    <label for="Name" class="mr-sm-2">{{trans('accounts_trans.student_name')}}</label>
                                                    <select class="fancyselect" name="student_id" required>
                                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                    </select>
                                                </div>
                                                {{-- <div class="col">
                                                    <label for="Name" class="mr-sm-2">{{trans('accounts_trans.student_name')}}</label>
                                                        <input  type="text" readonly class="form-control" 
                                                        name="Name" value="{{ $student->name }}">
                                                </div> --}}
                                            
                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{trans('accounts_trans.fees_type')}}</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="fee_id" required>
                                                            <option value="">-- {{trans('accounts_trans.select_item')}} --</option>
                                                            @foreach($fees as $fee)
                                                                <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{trans('accounts_trans.amount')}}</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="amount" required>
                                                            <option value="">-- {{trans('accounts_trans.select_item')}} --</option>
                                                            @foreach($fees as $fee)
                                                                <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                                <div class="col">
                                                    <label for="description" class="mr-sm-2">{{trans('accounts_trans.statement')}}</label>
                                                    <div class="box">
                                                        <input type="text" class="form-control" name="description" required>
                                                    </div>
                                                </div>
                                            
                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('My_Classes_trans.Processes') }}:</label>
                                                    <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('My_Classes_trans.delete_row') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button" value="{{ trans('My_Classes_trans.add_row') }}"/>
                                        </div>
                                    </div><br>
                                    <input type="hidden" name="Grade_id" value="{{$student->Grade_id}}">
                                    <input type="hidden" name="Classroom_id" value="{{$student->Classroom_id}}">
                                    
                                    <button type="submit" class="btn btn-primary">{{trans('Students_trans.submit')}}</button>
                                </div>
                            </div>
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