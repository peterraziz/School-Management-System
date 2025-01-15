@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('accounts_trans.add_new_fees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('accounts_trans.add_new_fees')}}
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
                    
                    <form method="post" action="{{ route('Fees.store') }}" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            
                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('accounts_trans.name_in_arabic')}}</label>
                                <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                            </div>
                        
                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('accounts_trans.name_in_english')}}</label>
                                <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                            </div>
                        
                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('accounts_trans.amount')}}</label>
                                <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                            </div>
                        
                        </div>
                    
                    <br>
                    
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('accounts_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="form-group col">
                                <label for="inputZip">{{trans('accounts_trans.classrooms')}}</label>
                                <select class="custom-select mr-sm-2" name="Classroom_id"> </select>
                            </div>
                        
                            <div class="form-group col">
                                <label for="inputZip">{{trans('accounts_trans.academic_year')}}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        
                            <div class="form-group col">
                                <label for="inputZip">{{trans('accounts_trans.fees_type')}}</label>
                                <select class="custom-select mr-sm-2" name="Fees_type">
                                    <option value="1">{{trans('accounts_trans.fees')}}</option>
                                    <option value="2">{{trans('accounts_trans.Bus_fees')}}</option>
                                </select>
                            </div>
                        
                        </div>
                    
                    <br>
                    
                        <div class="form-group">
                            <label for="inputAddress">{{trans('accounts_trans.Notes')}}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </div>
                        <br>
                    
                        <button type="submit" class="btn btn-success">{{trans('accounts_trans.submit')}}</button>
                    
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