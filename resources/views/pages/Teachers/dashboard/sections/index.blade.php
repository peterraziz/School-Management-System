@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('Sections_trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{ trans('Sections_trans.title_page') }}
    </h4>
@stop
<!-- breadcrumb -->
@section('content')
    <!-- row -->
    <div class="row">
    
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>{{trans('Students_trans.Grade')}}</th>
                                <th>{{trans('Students_trans.classrooms')}}</th>
                                <th class="alert-warning">{{trans('Students_trans.section')}}</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $section->Grades->Name }}</td>
                                    <td>{{ $section->My_classes->Name_Class }}</td>
                                    <td class="alert-warning">{{ $section->Name_Section }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
@endsection
@section('js')
@endsection