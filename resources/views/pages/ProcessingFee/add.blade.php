@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{trans('accounts_trans.Exclude_fees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{trans('accounts_trans.Exclude_fees')}} 
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
                    <span class="text-danger">( 
                        {{$student->name}} - 
                        {{$student->grade->Name}} - 
                        {{$student->classroom->Name_Class}} - 
                        {{$student->section->Name_Section}} 
                        )</span>
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
                    
                    <form method="post"  action="{{ route('ProcessingFee.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('accounts_trans.amount')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Debit" type="number" required>
                                    <input  type="hidden" name="student_id"  value="{{$student->id}}" class="form-control">
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('accounts_trans.Student_Balance')}} : </label>
                                    <input  class="form-control" name="final_balance" value="{{ number_format($student->student_account->sum('Debit') - $student->student_account->sum('credit'), 2) }}" type="text" readonly>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{trans('accounts_trans.statement')}} : <span class="text-danger">*</span></label>
                                    <textarea required class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </div> 
                        <br>
                        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
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