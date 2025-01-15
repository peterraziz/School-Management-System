@extends('layouts.master')
@section('css')
<!--Internal  Font Awesome -->
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal  treeview -->
<link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />
@section('title')
{{ trans('subjects_trans.show_permissons') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<h4 style="font-family: 'Cairo', sans-serif;">
    {{ trans('subjects_trans.show_permissons') }}
</h4>
<!-- breadcrumb -->

<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li>
                                <h4 style="font-family: 'Cairo', sans-serif;color: rgb(255, 111, 0)">
                                    {{ $role->name }} 
                                </h4> <hr> 
                                <ul>
                                    <h6 style="font-family: 'Cairo', sans-serif;">
                                        @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                        <li>{{ $v->name }}</li>
                                        @endforeach
                                        @endif
                                    </h6>                                   
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /col -->
                </div>
                <div class="main-content-label mg-b-5">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}">{{ trans('subjects_trans.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed --> 
<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>

@endsection