{{-- @can('Admins list') --}}
@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

@section('title')
    {{ trans('subjects_trans.admin_list') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h4 style="font-family: 'Cairo', sans-serif;">
        {{ trans('subjects_trans.admin_list') }}
    </h4>
@stop
<!-- breadcrumb --> 
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100"> {{--The second layout--}}
                <div class="card-body"> {{--The second layout--}}
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100"> {{--The second layout--}}
                            <div class="card-body">
                                @can('Add new admin')
                                <a href="{{route('Admins.create')}}" class="btn btn-success btn-sm" role="button"
                                    aria-pressed="true">{{ trans('subjects_trans.add_admin') }}
                                </a> 
                                @endcan
                            
                                @can('Admins permissions')
                                <a href="{{route('roles.index')}}" class="btn btn-primary btn-sm" role="button"
                                    aria-pressed="true">{{ trans('subjects_trans.admins_permissons') }}
                                </a>
                                @endcan
                                <br><br>
                                
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th> 
                                            <th>{{trans('subjects_trans.name')}}</th> 
                                            <th>{{trans('subjects_trans.Email')}}</th>  
                                            <th>{{trans('subjects_trans.Status')}}</th>
                                            <th>{{trans('subjects_trans.admin_type')}}</th> 
                                            <th>{{trans('Teacher_trans.Joining_Date')}}</th> 
                                            <th>{{trans('subjects_trans.Processes')}}</th> 
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($data as $key => $user)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{$user->name}}</td> 
                                            <td>{{$user->email}}</td> 
                                            <td>
                                                @if ($user->Status == 'Activated')
                                                    <span class="badge badge-success">
                                                        <div class="dot-label bg-success ml-1"></div>{{ $user->Status }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger">
                                                        <div class="dot-label bg-danger ml-1"></div>{{ $user->Status }}
                                                    </span>
                                                @endif
                                            </td> 
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $v)
                                                    <h6> 
                                                        <label class="label text-success">{{ $v }}</label>
                                                    </h6> 
                                                    @endforeach
                                                @endif
                                            </td>
                                            
                                            <td>{{$user->created_at}}</td> 
                                            <td>
                                                @can('Edit Admin')
                                                <a href="{{route('Admins.edit',$user->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{trans('subjects_trans.edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                            
                                                @can('Delete Admin')
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Admin{{ $user->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                @endcan
                                            </td>
                                            </tr>
                                        
                                            {{-- Modal --}}
                                            <div class="modal fade" id="delete_Admin{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Admins.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Teacher_trans.Delete_Teacher') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('My_Classes_trans.Warning_Grade') }}</p>
                                                            <input type="hidden" name="id"  value="{{$user->id}}">
                                                          
                                                        {{-- if i want to write the Field name --}}
                                                        <input id="name" type="text" name="name"
                                                        class="form-control"
                                                        value="{{ $user->name }}" disabled>
                                                    <br>
                                                        <input id="email" type="text" name="email"
                                                        class="form-control"
                                                        value="{{ $user->email }}" disabled>
                                                          
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}
                                                                    </button>
                                                                <button type="submit" class="btn btn-danger">
                                                                    {{ trans('My_Classes_trans.submit') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- or:: --}}
{{-- @toastr_js
@toastr_render --}}
@endsection
{{-- @endcan --}}