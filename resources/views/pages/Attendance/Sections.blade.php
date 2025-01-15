@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@section('title')
    {{ trans('Sections_trans.title_page') }}: 
    {{trans('attendance_trans.attendance_list')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{ trans('Sections_trans.title_page') }}: 
        {{trans('attendance_trans.attendance_list')}}
    </h4> 
@stop
<!-- breadcrumb --> 
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
            
                {{--  Button fow showing all students  --}}
                {{-- <div class="card-body"> 
                    <a class="button x-small" href="{{route('Attendance.show_data',$Grades->id)}}" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('attendance_trans.attendance_list') }}</a>
                </div> --}}
                
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">
                        
                            <a class="btn btn-dark" href="{{route('attendance.report2')}}"> 
                                <h6 style="font-family: 'Cairo', sans-serif;">
                                    <span class="text-white">
                                        {{trans('subjects_trans.Attendance_Reports')}}    
                                    </span>    
                                </h6> 
                            </a>
                            <br><br> 
                            
                            @foreach ($Grades as $Grade) 
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $Grade->Name }}</a>
                                    <div class="acd-des">
                                    
                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table table-hover center-aligned-table mb-0">
                                                            {{-- <table class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center"> --}}
                                                                <thead>
                                                                <tr class="alert-success" >
                                                                    <th>#</th>
                                                                    <th >{{ trans('Sections_trans.Name_Section') }}</th>
                                                                    <th>{{ trans('Sections_trans.Name_Class') }}</th>
                                                                    <th>{{ trans('Sections_trans.Status') }}</th>
                                                                    <th>{{ trans('Sections_trans.Processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($Grade->Sections as $list_Sections)
                                                                    <tr class="text-dark">
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td class="alert-success">{{ $list_Sections->Name_Section }}</td>
                                                                        <td>{{ $list_Sections->My_classes->Name_Class }}</td>
                                                                        <td>
                                                                            <label class="badge badge-{{$list_Sections->Status == 1 ? 'success':'danger'}}">{{$list_Sections->Status == 1 ? trans('subjects_trans.active'):trans('subjects_trans.inactive')}}</label>
                                                                        </td>
                                                                    
                                                                        <td>
                                                                            <a href="{{route('Attendance.show',$list_Sections->id)}}" class="btn btn-primary btn-sm" 
                                                                                role="button" aria-pressed="true">{{trans('attendance_trans.students_list')}}
                                                                            </a>
                                                                        
                                                                            {{-- <a href="{{route('Attendance.show_data',$Grades->id)}}" class="btn btn-primary btn-sm" 
                                                                                role="button" aria-pressed="true"> الغياب
                                                                            </a> --}}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
        <!-- row closed -->
        @endsection
        @section('js')
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
        {{-- or:: --}}
        @toastr_js
        @toastr_render
            <script>
                $(document).ready(function () {
                    $('select[name="Grade_id"]').on('change', function () {
                        var Grade_id = $(this).val();
                        if (Grade_id) {
                            $.ajax({
                                url: "{{ URL::to('classes') }}/" + Grade_id,
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    $('select[name="Class_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                },
                            });
                        } else {
                            console.log('AJAX load did not work');
                        }
                    });
                });
            </script>
@endsection