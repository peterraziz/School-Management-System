@can('Add new admin')
@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
{{ trans('subjects_trans.add_admin') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{ trans('subjects_trans.add_admin') }}
    </h4>
@stop
<!-- breadcrumb --> 
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form  action="{{route('Admins.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('subjects_trans.name') }}</label>
                                    <input required type="text" name="name" class="form-control">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div> 
                            
                                <div class="col">
                                    <label for="title">{{trans('Teacher_trans.Email')}}</label>
                                    <input required type="email" name="email" class="form-control">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div> 
                            
                                <div class="col">
                                    <label for="title">{{trans('Teacher_trans.Password')}}</label>
                                    <input required type="password" name="password" class="form-control">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div> 
                            </div> <br>
                        
                            <div class="row row-sm mg-b-20">
                                <div class="col-lg-6">
                                    <label for="inputName" class="control-label">{{ trans('subjects_trans.Status') }}</label>
                                    <select required name="Status" id="select-beast" class="custom-select">
                                        <option value="Activated">Activated</option>
                                        <option value="Not Activated">Not Activated</option>
                                    </select>
                                </div>
                            </div><br> 
                        
                            <div class="row mg-b-20">
                                <div required class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ trans('subjects_trans.admin_type') }}</label>
                                        {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple', 'required' => 'required')) !!}
                                    </div>
                                </div>
                            </div>
                            <br> 
                        
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">
                                {{ trans('subjects_trans.save_data') }}
                            </button>
                    </form>
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
@endcan