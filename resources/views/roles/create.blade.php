@extends('layouts.master')
@section('css')
<!--Internal  Font Awesome -->
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal  treeview -->
<link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />
@section('title')
{{ trans('subjects_trans.add_new_perm') }}
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<h4 style="font-family: 'Cairo', sans-serif;">
    {{ trans('subjects_trans.add_new_perm') }}
</h4>
<!-- breadcrumb -->
@endsection

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button> 
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        <div class="form-group">
                            <h6 style="font-family: 'Cairo', sans-serif;">
                                <p>{{trans('subjects_trans.admin_type')}} :</p>
                            </h6>     
                            {!! Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li>
                                <h6 style="font-family: 'Cairo', sans-serif;">
                                    {{trans('subjects_trans.permissons')}} <hr>
                                </h6>         
                                <ul>
                                    <li>
                            @foreach($permission as $value)
                            <label
                                style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}
                            </label>
                            @endforeach
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /col -->
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <hr>
                        <button type="submit" class="btn btn-success">{{ trans('subjects_trans.submit') }}</button>
                    </div> 
                </div> 
            </div> 
        </div><br><br>
    </div> 
</div>
<!-- row closed --> 
<!-- main-content closed -->

{!! Form::close() !!}
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
@endsection