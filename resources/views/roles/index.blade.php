@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
{{trans('subjects_trans.admins_permissons')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<h4 style="font-family: 'Cairo', sans-serif;">
    {{trans('subjects_trans.admins_permissons')}}
</h4>
<!-- breadcrumb -->
@endsection
@section('content') 

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100"> {{--The second layout--}}
                <div class="card-body"> {{--The second layout--}}
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100"> {{--The second layout--}}
                            <div class="card-body">
                                @can('Add new permission') 
                                    <a href="{{route('roles.create')}}" class="btn btn-success btn-sm" role="button"
                                        aria-pressed="true">{{ trans('subjects_trans.add_new_perm') }}
                                    </a>
                                    @endcan 
                                    <br> 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50"
                                        style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('subjects_trans.name') }}</th>
                                            <th>{{ trans('subjects_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $key => $role)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    @can('Show permission')
                                                        <a class="btn btn-success btn-sm" href="{{ route('roles.show', $role->id) }}">
                                                            {{trans('subjects_trans.show')}}
                                                        </a>
                                                    @endcan
                                                    
                                                    @can('Edit permission')
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('roles.edit', $role->id) }}">
                                                            {{trans('subjects_trans.edit')}}
                                                        </a>
                                                    @endcan
                                                    
                                                    @if ($role->name !== 'Owner')
                                                        @can('Delete permission')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                            {!! Form::submit(trans('subjects_trans.delete'), ['class' => 'btn btn-danger btn-sm']) !!}
                                                            {!! Form::close() !!}
                                                        @endcan
                                                    @endif
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
        <!--/div-->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection