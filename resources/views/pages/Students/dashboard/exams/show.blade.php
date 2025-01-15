@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    @livewireStyles
@section('title')
    {{trans('subjects_trans.questions_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<h4 style="font-family: 'Cairo', sans-serif;">
    <span class="text-danger">
        {{trans('subjects_trans.questions_list')}}
    </span>
</h4> 
@stop
<!-- breadcrumb --> 
@section('content')

    @livewire('show-question', ['quiz_id' => $quiz_id, 'student_id' => $student_id])

@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- or:: --}}
    {{-- @toastr_js
    @toastr_render --}}
    @livewireScripts
@endsection