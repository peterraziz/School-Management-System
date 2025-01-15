@can('Edit Admin')
@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
{{ trans('subjects_trans.profile') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<h4 style="font-family: 'Cairo', sans-serif;">
    {{ trans('subjects_trans.profile') }}
</h4>
@stop
<!-- breadcrumb --> 
@section('content')
    <!-- row -->
    <div class="card-body"> 
        <section style="background-color: #eee;">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{URL::asset('assets/images/admin.png')}}"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 650px;">
                            <h5 style="font-family: Cairo" class="my-3">{{$user->name}}</h5>
                            <p class="text-muted mb-1">{{$user->email}}</p>
                            <p class="text-muted mb-4">{{ trans('subjects_trans.admin') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{route('Admins.update',$user->id)}}" method="post">
                                @csrf 
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('subjects_trans.ar_username') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input required type="text" name="name" value="{{ $user->name }}" class="form-control">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                            
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{trans('Students_trans.email')}}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            {{-- <label>{{trans('Students_trans.email')}} : </label> --}}
                                            <input required type="email" value="{{ $user->email }}" name="email" class="form-control" >
                                        </div> 
                                    </div>
                                </div>
                                <hr> 
                            
                                <div class="col">
                                    <label for="title">{{trans('Teacher_trans.Password')}}</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control">
                                        <div class="input-group-append">
                                            <span title="{{ trans('subjects_trans.show_pass') }}" class="input-group-text" 
                                                onclick="togglePassword()" style="cursor: pointer;">
                                                <i class="far fa-eye-slash" id="toggleIcon"></i> <!-- Icon inside input -->
                                            </span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div><hr>
                            
                                <div class="row row-sm mg-b-20">
                                    <div class="col-lg-6">
                                        <label for="inputName" class="control-label">{{ trans('subjects_trans.Status') }}</label>
                                        <select required name="Status" id="select-beast" class="custom-select">
                                            <option value="Activated">Activated</option>
                                            <option value="Not Activated">Not Activated</option>
                                        </select>
                                    </div>
                                </div><hr> 
                            
                                <div class="row mg-b-20">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">{{ trans('subjects_trans.admin_type') }}</label>
                                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}                                        </div>
                                    </div>
                                </div>
                                <hr>
                            
                                <button type="submit" class="btn btn-primary">{{ trans('subjects_trans.edit_data') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- row closed -->
@endsection
@section('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
{{-- or:: --}}
@toastr_js
@toastr_render

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password"); // Updated to match your input ID
            var icon = document.getElementById("toggleIcon");
            if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye"); // Change icon to eye-slash when showing password
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash"); // Change icon back to eye when hiding password
            }
        }
    </script>
@endsection
@endcan